@extends('layouts.app')
@section('style')
    <style>
      body{
        background-color: black;
      }
    </style>
@endsection
@section('content')
    
<header id="header">
    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="/media/header.mp4" type="video/mp4">
    </video>
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1 class="display-3">
              <span class="h1 letter">P</span>
              <span class="h1 letter">R</span>
              <span class="h1 letter">E</span>
              <span class="h1 letter">S</span>
              <span class="h1 letter">T</span>
              <span class="h1 letter text10">0</span>
          </h1>
          <h6 class="lead mb-0 slug">your <span class="h4 text10 slug">e-commerce </span>drug</h6>
        <a href="{{route('ann.new')}}" class="btn btn-custom animation mt-4">Inserisci annuncio</a>
        </div>
      </div>
    </div>
  </header>

   <div class="container my-5 py-5">
     <div class="row">
       <div class="col-12 ml-5">
        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

          <ol class="carousel-indicators">
              <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#blogCarousel" data-slide-to="1"></li>
          </ol>

          <!-- Carousel items -->
          <div class="carousel-inner">

              <div class="carousel-item active">
                  <div class="row">
                      <div class="col-md-3">
                          <a href="#">
                              <img src="/media/gamepad.png" alt="Image" width="100">
                          </a>
                      </div>
                      <div class="col-md-3">
                          <a href="#">
                              <img src="/media/drug.png" alt="Image" width="100">
                          </a>
                      </div>
                      <div class="col-md-3">
                          <a href="#">
                              <img src="/media/car.png" alt="Image" width="100">
                          </a>
                      </div>
                      <div class="col-md-3">
                          <a href="#">
                              <img src="/media/home.png" alt="Image" width="100">
                          </a>
                      </div>
                  </div>
                  <!--.row-->
              </div>
              <!--.item-->

              <div class="carousel-item">
                  <div class="row">
                      <div class="col-md-3">
                          <a href="#">
                              <img src="/media/kitchen.png" alt="Image" width="100">
                          </a>
                      </div>
                      <div class="col-md-3">
                          <a href="#">
                              <img src="/media/linkedin.png" alt="Image" width="100">
                          </a>
                      </div>
                      <div class="col-md-3">
                          <a href="#">
                              <img src="/media/running.png" alt="Image" width="100">
                          </a>
                      </div>
                      <div class="col-md-3">
                          <a href="#">
                              <img src="/media/laptop.png" alt="Image" width="100">
                          </a>
                      </div>
                  </div>
                  <!--.row-->
              </div>
              <!--.item-->

          </div>
          <!--.carousel-inner-->
      </div>
      <!--.Carousel-->

       </div>
     </div>
   </div>









@endsection