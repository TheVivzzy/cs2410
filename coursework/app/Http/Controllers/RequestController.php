<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Animal;
Use App\Adoption;

class RequestController extends Controller
{
  // public function create($id)
  // {
  //   $animal = Animal::find($id);
  //   return view('adoption_requests.edit', compact('animal'));
  // }

  public function store(Request $request)
  {
    $adoption = $this->validate(request(),[
      'userId'=>'required',
      'animalId'=>'required',
      'name'=>'required',
    ]);

    $adoption = new Adoption;
    $adoption->userId = $request->input('userId');
    $adoption->animalId = $request->input('animalId');
    $adoption->name = $request->input('name');

    $adoption->save();

    return back()->with('succcess', 'Adoption request made');
  }

  public function index()
  {
    $adoptionsQuery = Adoption::all();
    return view('adoption_requests.viewrequests', array('adoptions'=>$adoptionsQuery));
  }

  public function review(Request $request, $id, $animalId)
  {
    $adoptions = Adoption::find($id);
    $adoptions->adopted = $request->input('adopted');
    $adoptions->save();

    if($adoptions->adopted == 'Accepted'){
      $animal = Animal::where('id', "=", $animalId)->first();
      $animal->availability  = '0';
      $animal->save();

      $other = Adoption::where("animalId", '=', $animalId)->where('adopted', '=', 'Pending')->get();
      foreach ($other as $info) {
        $info->adopted = 'Rejected';
        $info->save();
      }
    }
    return back()->with('success', 'Adoption Request has updated');
  }
}
