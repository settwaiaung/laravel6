<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsController extends Controller
{
    public function index()
    {
        $text = 'Js comming soon';
        return view('js', compact('text'));
    }
}
