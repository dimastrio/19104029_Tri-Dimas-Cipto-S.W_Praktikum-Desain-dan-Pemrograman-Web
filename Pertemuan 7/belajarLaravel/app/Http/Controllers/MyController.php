<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index(){
        return view('home');
    }
    
    public function about() {
        return view('about');
    }
}