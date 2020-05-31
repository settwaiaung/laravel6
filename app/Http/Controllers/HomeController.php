<?php

namespace App\Http\Controllers;

use App\Test;
use App\Receipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->check())
        {
            return redirect('receipe');
        }

        return view('welcome');
    }
}
