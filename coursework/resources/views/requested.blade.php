@extends('layouts.app')

@section('content')
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
