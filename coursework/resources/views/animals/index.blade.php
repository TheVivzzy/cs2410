@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <!-- admin portal which displays all the animals and option to delete, add or edit an animal entry -->
        <div class="card-header">Admin Portal - All Animal Adoptions</div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Pet Name</th>
                <th>Date Of Birth</th>
                <th>Type</th>
                <th>Description</th>
                <th>Availability</th>
                <th>Owner</th>
                <th colspan="3">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- get each databse entry for each animal and assign it to temp variable,
                  return back the animal information-->
              @foreach($animal as $temp)
              <tr>
                <td>{{$temp['name']}}</td>
                <td>{{$temp['dob']}}</td>
                <td>{{$temp['type']}}</td>
                <td>{{$temp['description']}}</td>
                <td>{{$temp['availability']}}</td>
                <?php
                $username = "";
                $adopt = $adoptions->where('animalId', '=', $temp['id'])->where('accepted', '=', 'Approved')->first();
                if($adopt != null)
                {
                  $userId = $adopt['userId'];
                  $user = $users->where('id', '=', $userId)->first();
                  $username = $user['username'];
                }
                ?>
                @if($username != "")
                <td><a href="{{route('user', ['username'=> $username])}}">{{$username}}</a></td>
                @else <td>No Owner Yet</td>
                @endif
                <td><a href="{{action('AnimalController@show', $temp['id'])}}" class="btn
                  btn- primary">Details</a></td>
                  <td><a href="{{action('AnimalController@edit', $temp['id'])}}" class="btn
                    btn- warning">Edit</a></td>
                    <td>
                      <form action="{{action('AnimalController@destroy', $temp['id'])}}"
                      method="post"> @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit"> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="{{action('AnimalController@create')}}" class="btn
              btn-primary">Add Pet</a>
              <a href="{{route('viewrequests')}}" class="btn
                btn-primary">View All Adoption Decisions</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
