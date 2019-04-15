@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Edit and update the animal</div>
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
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ action('AnimalController@update',
          $animal['id']) }} " enctype="multipart/form-data" >
          @method('PATCH')
          @csrf
          <div class="col-md-8">
            <label >Name:</label>
            <input type="text" name="name" value="{{$animal->name}}" />
          </div>
          <div class="col-md-8">
            <label>Date Of Birth:</label>
            <input type="date" name="dob" value="{{$animal->dob}}" />
          </div>
          <div class="col-md-8">
            <label>Type:</label>
            <select name="type">
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
          </div>
          <div class="col-md-8">
            <label >Description:</label>
            <textarea rows="1" cols="50" name="description"> {{$animal->description}} </textarea>
          </div>
          <div class="col-md-8">
            <label>Animal Availability:</label>
            <select name="availability">
              <option value="Available">Available</option>
              <option value="Unavailable">Not Available</option>
            </select>
          </div>
          <div class="col-md-8">
            <label>Picture:</label>
            <input type="file" name="picture"
            placeholder="Image file" />
          </div>

          <div class="col-md-6 col-md-offset-4">
            <input type="submit" class="btn btn-primary" />
            <input type="reset" class="btn btn-primary" />
            <td><a href="{{route('display_animals')}}" class="btn btn-primary" role="button">Back</a></td>

          </a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
@endsection
