<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Animal;

class AnimalController extends Controller
{
  public function display()
  {
    $animalQuery = Animal::all();
    // if (Gate::denies('displayall')) {
    //   $animalQuery=$animalQuery->where('id', auth()->user()->id);
    // }
    return view('/display', array('animals'=>$animalQuery));
  }

}
