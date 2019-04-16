@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Your Adoption Requests</div>
        <div class="card-body">
          <!-- display the success status -->
          @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div>
          @endif
          <!-- Table to display to adoption decision made which is viewed by the user -->
            <a href="{{route('display')}}" class="btn btn-primary" role="button"> Back </a>
            <br> <br>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Pet Name</th><th>Type</td><th>Decision</th>
              </tr>
            </thead>
            <tbody>
              @foreach($adoptions as $adoption)
              @foreach ($animals as $animal)
              @if($adoption->userId == $userId)
              @if($adoption->userId == $userId && $adoption->animalId == $animal->id)
              <tr>
                <td> {{$adoption->name}} </td>
                <td> {{$animal->type}} </td>
                <td> {{$adoption->accepted}} </td>
              </tr>
              @endif
              @endif
              @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
