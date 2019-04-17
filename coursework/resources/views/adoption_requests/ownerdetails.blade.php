@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Owners Details</div>
        <div class="card-body">
          <!-- table to display owners details for each adoption -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Postcode</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$users['username']}}</td>
                <td>{{$users['firstname']}}</td>
                <td>{{$users['lastname']}}</td>
                <td>{{$users['email']}}</td>
                <td>{{$users['address']}}</td>
                <td>{{$users['postcode']}}</td>
                </tr>
              </tbody>
            </table>
              <a href="{{route('display_animals')}}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
