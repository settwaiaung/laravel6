<?php

namespace App\Http\Controllers;

use App\User;
use App\Receipe;
use App\Category;
use App\Mail\ReceipeStored;
use Illuminate\Http\Request;
use App\Exports\ReceipeExport;
use App\Events\ReceipeStoredEvent;
use App\Http\Requests\StoreReceipe;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\ReceipeStoredNotification;
use App\Notifications\ReceipeDeletedNotification;


class ReceipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $receipes = Receipe::where('author_id', auth()->id())->latest()->get();
        
        return view('admin.receipe.index', compact('receipes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.receipe.create', compact('categories'));
    }

    public function store(StoreReceipe $request)
    {
        $receipe = $request->validated();
        
        $imageName = date('YmdHis').".".request()->image->getClientOriginalExtension();
        
        request()->image->move(public_path('images'), $imageName);

        $receipe['image'] = $imageName;
        
        Receipe::create($receipe+['author_id' => auth()->id(), 'image' => $imageName]);

        //$user = User::find(auth()->id());
        
        //$user->notify(new ReceipeStoredNotification);

        return redirect('receipe')->with('status', 'A new receipe is successfully created!');
    }

    public function show(Receipe $receipe)
    {
        $this->authorize('view', $receipe);
        return view('show', compact('receipe'));
    }

    public function edit(Receipe $receipe)
    {
        $this->authorize('view', $receipe);
        $categories = Category::all();
        return view('admin.receipe.edit', compact('categories', 'receipe'));
    }

    public function update(Request $request, Receipe $receipe)
    {
        if(isset(request()->image))
        {
            $valudated_receipe = request()->validate([
                'name' => 'required',
                'ingredients' => 'required',
                'category_id' => 'required',  
            ]);

            request()->validate([
                'image' => 'required|image', 
            ]);
            
            $imageName = date('YmdHis').".".request()->image->getClientOriginalExtension();
            
            request()->image->move(public_path('images'), $imageName);

            $receipe->update($valudated_receipe+['image' => $imageName]);
        }
        else 
        {
            $receipe->update(request()->validate([
                'name' => 'required',
                'ingredients' => 'required',
                'category_id' => 'required',
            ]));
        }
        
        return redirect('/receipe')->with('status', 'The receipe is successfully edited!');
    }

    public function destroy(Receipe $receipe)
    {

        $receipe->delete();

        $user = User::find(auth()->id());
        
        $user->notify(new ReceipeDeletedNotification);

        return redirect('/receipe');
    }

    public function export() 
    {
        return Excel::download(new ReceipeExport, 'receipes.xlsx');
        return redirect('/receipe');
    }
}
