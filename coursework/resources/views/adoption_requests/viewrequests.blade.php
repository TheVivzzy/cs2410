@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Make Adoption Decisions</div>
        <div class="card-body">
          <!-- display the success status -->
          @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div><br />
          @endif
          <br>
         <!-- Table to display the adoption request made by a user and the ability
              for the admin to make a decision -->
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>AnimalId</th><th>Name</th><th>User Id</th><th>Current Decision</th>
                <th>Decision</th>
              </tr>
            </thead>
            <tbody>
              @foreach($adoptions as $adoption)
              @foreach($animals as $animal)
              @if($adoption->animalId == $animal->id)
              <tr>
                <td> {{$adoption->animalId}} </td>
                <td> {{$adoption->name}} </td>
                <td> {{$adoption->userId}} </td>
                <td> {{$adoption->accepted}} </td>
                <td>
                  <form class="form-horizontal" method="POST" action="{{
                    action('RequestController@review', [$adoption->id, $adoption->animalId]) }}"
                    enctype="multipart/form-data">
                    @csrf
                  <select name="accepted">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                  </select>
                  <input type="submit" class="btn btn-primary" />
                </form>
                 </td>
              </tr>
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
