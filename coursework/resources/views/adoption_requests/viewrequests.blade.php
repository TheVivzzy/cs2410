@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">All Your Animal Requests</div>
        <div class="card-body">
          <!-- display the success status -->
          @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div><br />
          @endif
          <br>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>AnimalId</th><th>Name</th><th>User Id</th>
                <th> Decision</th>
              </tr>
            </thead>
            <tbody>
              @foreach($adoptions as $adoption)
              @if($adoption->adopted == 'Pending')
              <tr>
                <td> {{$adoption->animalId}} </td>
                <td> {{$adoption->name}} </td>
                <td> {{$adoption->userId}} </td>
                <td>
                  <form class="form-horizontal" method="POST" action="{{
                    action('RequestController@review', [$adoption->id, $adoption->animalId]) }}"
                    enctype="multipart/form-data">
                    @csrf
                  <select name="adopted">
                    <option value="Pending">Pending</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                  </select>
                  <input type="submit" class="btn btn-primary" />
                </form>
                 </td>
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
