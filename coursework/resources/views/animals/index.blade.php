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
                <th>Name</th>
                <th>Dob</th>
                <th>Description</th>
                <!-- <th>Availability</th> -->
                <th>Image</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($animal as $temp)
              <tr>
                <td>{{$temp['name']}}</td>
                <td>{{$temp['dob']}}</td>
                <td>{{$temp['description']}}</td>
                <td>{{$temp['picture']}}</td>
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
            <td><a href="{{action('AnimalController@create', $temp['id'])}}" class="btn
              btn- info">Add Pet</a></td>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
