<?php

namespace App\Http\Controllers;

use App\Receipe;
use App\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $receipes = Receipe::where('author_id', auth()->id())->latest()->get();
        $categories = Category::all();
        
        return view('admin.dashboard', compact('receipes', 'categories'));
    }
}
