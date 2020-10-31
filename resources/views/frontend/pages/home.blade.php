@extends('frontend.layouts.master')
@section('title')
    Coaching Management System
@endsection
@section('main-content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('frontend/assets/images/coaching1.jpg')}}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
       <h1 class="bg-light p-3 text-dark">Coaching Management System</h1>
    </div>
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('frontend/assets/images/coaching2.jpg')}}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
       <h1 class="text-dark bg-light p-3">Coaching Management System</h1>
    </div>
      </div>
      <div class="carousel-item">
           <img class="d-block w-100" src="{{ asset('frontend/assets/images/coaching3.jpg')}}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
       <h1 class="text-dark bg-light p-3">Coaching Management System</h1>
    </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
      </div>
  
@endsection