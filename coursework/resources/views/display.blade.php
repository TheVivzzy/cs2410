@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Make Adoption Requests</div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif

        <form method="GET" action="{{action('AnimalController@display')}}">
          <div align="right">
            <br>
           <label>Filter Animal Type:</label>
            <select name="filter" class="btn btn-primary">
              <option value="">All Types</option>
              <option value="Dog">Dog</option>
              <option value="Cat">Cat</option>
              <option value="Parrot">Parrot</option>
              <option value="Fish">Fish</option>
              <option value="Rabbit">Rabbit</option>
              <option value="Snake">Snake</option>
              <option value="Mouse">Mouse</option>
              <option value="Turtle">Turtle</option>
              <option value="Lizard">Lizard</option>
            </select>
            <input type="submit" name="submit" value="Filter" class="btn btn-primary">
            <br> <br>
          </div>
        </form>

        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th> Name</th><th>Type</th><th>Date Of Birth</th>
              <th> Description</th><th>Image</th><th>Request to Adopt</th>
            </tr>
          </thead>
          <tbody>
            @foreach($animals as $animal)
            <?php $requested = false; ?>
            @if($animal->availability == 'Available' && ($animal->type == $filter || $filter == ""))
            <tr>
              <td> {{$animal->name}} </td>
              <td> {{$animal->type}} </td>
              <td> {{$animal->dob}} </td>
              <td> {{$animal->description}} </td>
              <td><center><img style="width:50%; height:50%" src="{{asset('storage/img/'.$animal['picture'])}}"></center></td>
              @foreach($adoptions as $adoption)
              @if($adoption->userId == $userId && $adoption->animalId == $animal->id)
              <td> Processing! </td>
              <?php $requested = true; ?>
              @endif
              @endforeach
              @if($requested == false)
              <td>
                <form method="POST" class="form-horizontal" action="{{action('RequestController@store', $animal['id'])}}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="userId" value="{{ $userId }}"/>
                  <input type="hidden" name="animalId" value="{{ $animal['id'] }}"/>
                  <input type="hidden" name="name" value="{{ $animal['name'] }}"/>
                  <input type="submit" class="btn btn-primary" value="Adopt This Animal"/>
                </form>

              </td>
              @endif
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>

        <td><a href="{{route('userrequests')}}" class="btn btn-primary" role="button">View Your Adoption Requests</a></td>
      </div>
    </div>
  </div>
</div>
@endsection
