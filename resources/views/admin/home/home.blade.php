@extends('admin.master')
@section('main-content')
{{-- for show message --}}
@if (Session::get('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Message : </strong> {{Session::get('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
@endif
@if (Session::get('error_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Message : </strong> {{Session::get('error_message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
@endif
    <!--Slider Start-->
<section class="container-fluid">
    <div class="row">
        <div class="col-12 pl-0 pr-0">
            <div class="owl-carousel">
              @foreach($slides as $slide)
            <div class="item">
            <img src="{{asset('/')}}{{ $slide->slide_image}}" alt="">
              <div class="slide-caption">
                <h5>{{ $slide->slide_title }}</h5>
                <p>{{ $slide->slide_description }}</p>
              </div>
          </div>
          @endforeach
            </div>
        </div>
    </div>
</section>
<!--Slider End-->
@endsection
@section('title')
    Coching Management System | Laravel
@endsection