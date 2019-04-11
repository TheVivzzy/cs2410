@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th> Name</th><th> Dob</th>
                <th> Description</th><th>Image</th>
              </tr>
            </thead>
            <tbody>
              @foreach($animals as $animal)
              @if($animal->availability == 1)
              <tr>
                <td> {{$animal->name}} </td>
                <td> {{$animal->dob}} </td>
                <td> {{$animal->description}} </td>
                <td><center><img style="width:50%; height:50%" src="{{asset('storage/img/'.$animal->picture)}}"></center></td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
