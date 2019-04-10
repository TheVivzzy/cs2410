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
    return view('/display', array('animals'=>$animalQuery));
  }

  public function create()
  {
    return view('animals/create');
  }

  public function store(Request $request)
  {
    // form validation
    $animal = $this->validate(request(), [
      'name' => 'required',
      'dob' => 'required',
      'picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
    ]);
    //Handles the uploading of the image
    if ($request->hasFile('picture')){
      //Gets the filename with the extension
      $fileNameWithExt = $request->file('picture')->getClientOriginalName();
      //just gets the filename
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //Just gets the extension
      $extension = $request->file('picture')->getClientOriginalExtension();
      //Gets the filename to store
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      //Uploads the image
      $path =$request->file('picture')->storeAs('public/img', $fileNameToStore);
    }
    else {
      $fileNameToStore = 'noimage.jpg';
    }
    // create a Animal object and set its values from the input
    $animal = new Animal;;
    $animal->name = $request->input('name');
    $animal->dob = $request->input('dob');
    $animal->description = $request->input('description');
    $animal->created_at = now();
    $animal->picture = $fileNameToStore;
    // save the Animal object
    $animal->save();
    // generate a redirect HTTP response with a success message
    return back()->with('success', 'Animal has been added');

  }

  public function index()
  {
    $animal = Animal::all()->toArray();
    return view('animals.index', compact('animals'));
  }

}