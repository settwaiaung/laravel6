<?php

namespace App\Http\Controllers;

use App\Receipe;
use App\Category;
use Illuminate\Http\Request;

class ReceipeController extends Controller
{
    public function index()
    {
        $receipes = Receipe::latest()->get();
        return view('receipe', compact('receipes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        Receipe::create(request()->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'category_id' => 'required',
        ]));

        return redirect('receipe');
    }

    public function show(Receipe $receipe)
    {
        return view('show', compact('receipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipe $receipe)
    {
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
        return redirect('/receipe');
    }
}
