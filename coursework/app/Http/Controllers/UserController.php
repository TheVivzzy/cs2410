<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($username)
    {
      $users = User::where('username', '=', $username)->first();
      return view('adoption_requests.ownerdetails', compact('users'));
    }
}
