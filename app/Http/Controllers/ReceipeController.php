<?php

namespace App\Http\Controllers;

use App\User;
use App\Receipe;
use App\Category;
use App\Mail\ReceipeStored;
use Illuminate\Http\Request;
use App\Events\ReceipeStoredEvent;
use Illuminate\Support\Facades\Mail;
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
        
        return view('receipe', compact('receipes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $receipe = Receipe::create(request()->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'category_id' => 'required',
        ])+['author_id' => auth()->id()]);

        $user = User::find(auth()->id());
        
        $user->notify(new ReceipeStoredNotification);

        //event(new ReceipeStoredEvent($receipe));

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
        return view('edit', compact('categories', 'receipe'));
    }

    public function update(Request $request, Receipe $receipe)
    {
        $receipe->update(request()->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'category_id' => 'required',
        ]));

        return redirect('/receipe/'.$receipe->id);
    }

    public function destroy(Receipe $receipe)
    {

        $receipe->delete();

        $user = User::find(auth()->id());
        
        $user->notify(new ReceipeDeletedNotification);

        return redirect('/receipe');
    }
}
