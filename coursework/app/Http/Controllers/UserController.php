<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
      * obtain username of the user and return back their details
      * to display which owner adopts an animal
     */
    public function show($username)
    {
      $users = User::where('username', '=', $username)->first();
      return view('adoption_requests.ownerdetails', compact('users'));
    }
}
