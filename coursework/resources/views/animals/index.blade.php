@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Display all Animals</div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Pet Name</th>
                <th>Owner</th>
                <th>Dob</th>
                <th>Description</th>
                <!-- <th>Availability</th> -->
                <th>Availability</th>
                <th colspan="3">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($animal as $temp)
              <tr>
                <td>{{$temp['name']}}</td>
                <td>{{$temp['dob']}}</td>
                <td>{{$temp['description']}}</td>
                <td>{{$temp['availability']}}</td>
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
              btn- info">Add Pet</a>
              <a href="{{route('viewrequests')}}" class="btn
                btn- info">View All Adoptions</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
