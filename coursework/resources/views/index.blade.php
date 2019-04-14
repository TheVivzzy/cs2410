<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
</head>

<body>
@include('layouts.app')

        <!--- Image Slider -->
        <div id="slides" class ="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators" class ="active">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1"><li>
                <li data-target="#slides" data-slide-to="2"><li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active" >
                    <img src="{{ asset('img/dogs.jpg') }}" >
            <div class = "carousel-caption">
                <h1 class="display-2">WELCOME TO ASTON ANIMAL SANCTUARY</h1>
                <h3 class= "display-4"> Adopt your animal with us</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/cats.jpg') }}" >
            <div class = "carousel-caption">
                <h1 class="display-2">WELCOME TO ASTON ANIMAL SANCTUARY</h1>
                <h3 class= "display-4"> Adopt your animal with us</h3>

            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/parrots.jpg') }}" >
            <div class = "carousel-caption">
                <h1 class="display-2">WELCOME TO ASTON ANIMAL SANCTUARY</h1>
                <h3 class= "display-4"> Adopt your animal with us</h3>

            </div>
        </div>

    </div>
</div>


<!---About us -->
<div class="container-fluid padding">
    <div class="welcome text-center">
        <div class="col-12">
            <h1 class="display-5">What We Do</h1>
            <p> Here at Aston Animal Sanctuary, every animal deserves a home. We aim to make sure every animal deserves a warm, comfortable and caring home. </p>
        </div>
        <hr>
    </div>
</div>


</body>

</html>
