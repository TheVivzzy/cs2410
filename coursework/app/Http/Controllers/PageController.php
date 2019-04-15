<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // return the index of the view 
    public function index(){
        return view('index');
    }
}
