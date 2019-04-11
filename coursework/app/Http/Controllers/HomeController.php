<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $animalsQuery = Animal::all();
      return view('/home', array('animals'=>$animalsQuery));
    }
}
