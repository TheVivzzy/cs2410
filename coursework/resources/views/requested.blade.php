@extends('layouts.app')
@section('content')

<!-- When pressing the adopt button in the user view to Adopt,
 returns back your request has been made on button click -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Your Request</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          Your Request Has Been Made! <br> <br>
          <td><a href="{{route('home')}}" class="btn btn-primary" role="button">Back</a></td>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
