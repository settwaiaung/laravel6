<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhpController extends Controller
{
    public function index()
    {
        $catalog = [
            'Unit 1' => 'Php Introduction',
            'Unit 2' => 'Php OOP',
            'Unit 3' => 'Php Class'
        ];
        
        return view('php', compact('catalog'));
    }
}
