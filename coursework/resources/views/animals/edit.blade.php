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
            <label >Name</label>
            <input type="text" name="name"
            placeholder="name" />
          </div>
          <div class="col-md-8">
            <label>Dob</label>
            <input type="date" name="dob"
            placeholder="yyyy/mm/dd" />
          </div>
          <div class="col-md-8">
            <label >Description</label>
            <textarea rows="2" cols="50" name="description"> Animal description </textarea>
            </div>
            <div class="col-md-8">
              <label>Picture</label>
              <input type="file" name="picture"
              placeholder="Image file" />
            </div>
            <div class="col-md-8">
              <label>Availability</label>
              <input type="hidden" name="availability"
              value="0" />
              <input type="checkbox" name="availability"/>
            </div>
          <div class="col-md-6 col-md-offset-4">
            <input type="submit" class="btn btn-primary" />
            <input type="reset" class="btn btn-primary" />
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
@endsection
