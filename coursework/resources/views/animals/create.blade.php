@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Create a new Animal</div>
        <!-- display the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">0
          <ul> @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> @endforeach
          </ul>
        </div><br /> @endif
        <!-- display the success status -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br /> @endif
        <!-- defines the form for the admin to create a new animal entry -->
        <div class="card-body">
          <form class="form-horizontal" method="POST"
          action="{{url('animals') }}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-8">
            <label >Name:</label>
            <input type="text" name="name"
            placeholder="name" />
          </div>
          <div class="col-md-8">
            <label>Date of Birth:</label>
            <input type="date" name="dob"
            placeholder="yyyy/mm/dd" />
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
            <textarea rows="1" cols="50" name="description"> Animal description </textarea>
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
            </div> <br>
            <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary" />
              <input type="reset" class="btn btn-primary" />
              <td><a href="{{route('display_animals')}}" class="btn btn-primary" role="button">Back</a></td>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
