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
       <div class="col-6 col-md-12 ml-5">
        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

          <ol class="carousel-indicators">
              <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#blogCarousel" data-slide-to="1"></li>
          </ol>

          <!-- Carousel items -->
          <div class="carousel-inner">

              <div class="carousel-item active">
                  <div class="row">
                      <div class="col-12 col-md-3">
                      <a href="{{route('public.announcements', [6])}}">
                              <img src="/media/gamepad.png" alt="Image" width="100">
                              <p class="ml-4 mt-2 text-white">Games</p>
                          </a>
                      </div>
                      <div class="col-12 col-md-3">
                          <a href="{{route('public.announcements', [5])}}">
                              <img src="/media/drug.png" alt="Image" width="100">
                              <p class="ml-4 mt-2 text-white">Drugs</p>
                          </a>
                      </div>
                      <div class="col-12 col-md-3">
                          <a href="{{route('public.announcements', [1])}}">
                              <img src="/media/car.png" alt="Image" width="100">
                              <p class="ml-4 mt-2 text-white">Cars</p>
                          </a>
                      </div>
                      <div class="col-12 col-md-3">
                          <a href="{{route('public.announcements', [3])}}">
                              <img src="/media/home.png" alt="Image" width="100">
                              <p class="ml-4 mt-2 text-white">Home</p>
                          </a>
                      </div>
                  </div>
                  <!--.row-->
              </div>
              <!--.item-->

              <div class="carousel-item">
                  <div class="row">
                      <div class="col-12 col-md-3">
                          <a href="{{route('public.announcements', [4])}}">
                              <img src="/media/kitchen.png" alt="Image" width="100">
                              <p class="ml-4 mt-2 text-white">Funrinture</p>
                          </a>
                      </div>
                      <div class="col-12 col-md-3">
                          <a href="{{route('public.announcements', [2])}}">
                              <img src="/media/linkedin.png" alt="Image" width="100">
                              <p class="ml-4 mt-2 text-white">Jobs</p>
                          </a>
                      </div>
                      <div class="col-12 col-md-3">
                          <a href="{{route('public.announcements', [7])}}">
                              <img src="/media/running.png" alt="Image" width="100">
                              <p class="ml-4 mt-2 text-white">Sport</p>
                          </a>
                      </div>
                      <div class="col-12 col-md-3">
                          <a href="{{route('public.announcements', [8])}}">
                              <img src="/media/laptop.png" alt="Image" width="100">
                              <p class="ml-4 mt-2 text-white">Computers</p>
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

   
   <div class="container my- 5 py-5">
       <div class="row justify-content-center ">
        {{-- <h3 class="text30 mb-5">Recently added..</h3>
        <div class="col-12 col-md-2 d-flex flex-column align-items-center justify-content-center">
            
            <img src="/media/neon.png" alt="" height="100">
           </div>  --}}
           @foreach ($announcements as $a)
           <div class="col-12 col-md-6 col-lg-4 mb-4">
           
            <div class="card" style="width: 18rem;">
                <img src="https://picsum.photos/150/150
                " class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="bg30">{{$a->title}} </h3>
                  <p class="cat"><a href="{{route('public.announcements', [$a->category->id])}}" class="text10">{{$a->category->name}}</a></p>
                <p class="text-right">Added by: {{$a->user->name}}</p>
                  <p class="card-text">{{$a->description}}</p>
                  <button class="btncustom mt-2 mx-auto d-block">Details</button>
                </div>
              </div>
                       
           </div>
           @endforeach   
       </div>
   </div> 






@endsection