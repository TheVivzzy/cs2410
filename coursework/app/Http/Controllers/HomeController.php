<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\User;

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
      $username = \Auth::user()->firstname;
      return view('/home', array('animals'=>$animalsQuery, 'username'=>$username));
    }

    public function requested(){
      return view('requested');
    }

}
