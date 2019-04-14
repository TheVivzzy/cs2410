<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Animal;
use App\Adoption;
use App\User;
use Validator;

class AnimalController extends Controller
{
  public function display()
  {
    $requested = false;
    $animalsQuery = Animal::all();
    $userId = \Auth::user()->id;
    $adoptionsQuery = Adoption::all();
    return view ('/display', array('animals'=>$animalsQuery, 'userId'=>$userId,
    'adoptions'=>$adoptionsQuery, 'requested'=>$requested));
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
      'availability' => 'required',
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
    $animal->availability = $request->input('availability');
    $animal->created_at = now();
    $animal->picture = $fileNameToStore;
    // save the Animal object
    $animal->save();
    // generate a redirect HTTP response with a success message
    return back()->with('success', 'Animal has been added');

  }

  public function index()
  {
    $animal = Animal::all();
    $adoptions = Adoption::all();
    $users = User::all();
    return view('animals.index', array('animal'=>$animal, 'adoptions'=>$adoptions, 'users'=>$users));
  }

  public function user() // might need to get of this ............
  {
    $animal = Animal::all();
    $adoptions = Adoption::all();
    $users = User::all();
    return view('animals.index', array('animal'=>$animal, 'adoptions'=>$adoptions, 'users'=>$users));

  }

  public function show($id)
  {
    $animal = Animal::find($id);
    return view('animals.show',compact('animal'));
  }

  public function destroy($id)
  {
    $animal = Animal::find($id);
    $animal->delete();
    $adoptions = Adoption::where('animalId', '=', $id);
    $adoptions->delete();
    return redirect('animals')->with('success','Animal has been deleted');
  }

  public function update(Request $request, $id)
  {
    $animal = Animal::find($id);
    $this->validate(request(), [
      'name' => 'required',
      'dob' => 'required',
      'picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
      'availability' => 'required',
    ]);
    $animal->name = $request->input('name');
    $animal->dob = $request->input('dob');
    $animal->description = $request->input('description');
    $animal->availability = $request->input('availability');
    // $animal->updated_at = now();
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
      $path = $request->file('picture')->storeAs('public/img', $fileNameToStore);
    } else {
      $fileNameToStore = 'noimage.jpg';
    }
    $animal->picture = $fileNameToStore;
    $animal->save();
    return redirect('animals')->with('success','Animal has been updated');
  }

  public function edit($id)
  {
    $animal = Animal::find($id);
    return view('animals.edit',compact('animal'));
  }
}
