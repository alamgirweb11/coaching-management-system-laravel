@extends('admin.master')
@section('title')
    Coching Management System | Laravel
@endsection
@section('main-content')
    <!--Slider Start-->
<section class="container-fluid">
    <div class="row">
        <div class="col-12 pl-0 pr-0">
            <div class="owl-carousel">
            <div class="item"><img src="{{asset('admin/assets/images/img-1.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('admin/assets/images/img-2.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('admin/assets/images/img-3.jpg')}}" alt=""></div>  
            <div class="item"><img src="{{asset('admin/assets/images/img-4.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('admin/assets/images/img-5.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('admin/assets/images/img-6.jpg')}}" alt=""></div>
            </div>
        </div>
    </div>
</section>
<!--Slider End-->
@endsection