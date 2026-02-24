<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Повертає файл resources/views/welcome.blade.php
        return view('welcome');
    }

    public function about()
    {
        // Повертає файл resources/views/about.blade.php
        return view('about');
    }
}