@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">All Decisions Ever Made</div>
        <div class="card-body">
          <!-- display the success status -->
          @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div><br />
          @endif
          <br>
          <!-- table to display decision of each adoption request -->
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th> Animal Name</th><th>Username</th><th>Decision</th>
              </tr>
            </thead>
            <tbody>
              @foreach($adoptions as $adoption)
              <tr>
                <?php
                $animal = $animals->where('id', '=', $adoption->animalId)->first();
                $user = $users->where('id', '=', $adoption->userId)->first();
                 ?>
                <td> {{$animal->name}} </td>
                <td> {{$user->username}} </td>
                <td> {{$adoption->adopted}} </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
