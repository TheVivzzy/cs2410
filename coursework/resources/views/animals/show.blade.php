@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">This Animals Information</div>
        <div class="card-body">

          <!-- table which shows and obtains the animal information from the database -->
          <table class="table table-striped" border="1" >
            <tr> <td> <b>Name</th> <td> {{$animal['name']}}</td></tr>
              <tr> <th>Date of Birth</th> <td>{{$animal['dob']}}</td></tr>
              <tr> <th>Description</th> <td style="max-width:150px;" >{{$animal['description']}}</td></tr>
              <tr> <th>Availability</th> <td>{{$animal['availability']}}</td></tr>
              <tr> <td>Imag </th> <td>{{$animal['picture']}}</td></tr>
              <tr> <td colspan='2' ><img style="width:100%; height:100%"
                src="{{ asset('storage/img/'.$animal['picture'])}}"></td></tr>
              </table>
              <table><tr>
                <td><a href="{{route('display_animals')}}" class="btn btn-primary" role="button">Back</a></td>
                <td><a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn
                  btn- warning">Edit</a></td>
                  <td><form action="{{action('AnimalController@destroy', $animal['id'])}}"
                    method="post"> @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form></td>
                </tr></table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
