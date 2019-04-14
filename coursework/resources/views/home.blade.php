@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          Hello {{$username}}, you are logged in! <br> Welcome to Aston Animal Sanctuary. <br>
          We aim to make sure every animal deserves a warm, comfortable and caring home.

          <br> <br>
          <a href="{{ route('display') }}" class="btn btn-primary">Display Animals</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
