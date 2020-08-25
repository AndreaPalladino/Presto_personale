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
        <a href="{{route('ann.new')}}" class="btn btn-custom animation mt-4">Create Announcement</a>
        </div>
      </div>
    </div>
  </header>
  @if (session('access.denied'))
    <div class="alert alert-danger text-center">
      Access denied. Revisor only!

    </div>
 @endif
  @if (session('admin.denied'))
    <div class="alert alert-danger text-center">
      Access denied. Admin only!

    </div>
  @endif

   <div class="container my-5 py-5">
     <div class="row">
         @foreach($categories as $c)
         <div class="col-12 d-flex d-md-none bg30 my-2 flex-column justify-content-center align-items-center">
             <div class= "heightCustom">
                <a href="{{route('public.announcements', [$c->id])}}" class="">
                <h3 class="text-dark mt-3">{{$c->name}}</h3></a>
             </div>
         </div>
         @endforeach
       <div class="col-6 col-md-12 ml-5">
        <div id="blogCarousel" class="carousel slide d-none d-md-flex" data-ride="carousel">

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

   
   <div class="container my-5 py-5">
       <div class="row justify-content-center ">
           @foreach ($announcements as $announcement)
           <div class="col-12 col-md-6 col-lg-4 mb-4">

            <div class="card cardCustom h-100">
                
            <img class="card-img-top" src="{{$announcement->images->first()->getUrl(300,150)}}" alt="">
                
                <div class="card-body">
                  <h4 class="card-title">
                    {{$announcement->title}}
                  </h4>
                  <p class="cat"><a href="{{route('public.announcements', [$announcement->category->id])}}" class="text10">{{$announcement->category->name}}</a></p>
                  <p class="text-right">Added by: {{$announcement->user->name}}</p>
                  <p class="card-text">{{$announcement->description}}</p>
                <a href="{{route('public.detail', compact('announcement'))}}"  class="btn btncustom mt-2 mx-auto d-block">Details</a>
                </div>
              </div>   
           </div>
           @endforeach   
       </div>
   </div> 


   <div class="container my-5 py-5">
       <div class="row">
           <div class="col-12">
            <div class="card bg-dark text-white">
                <img src="/media/users.jpeg" class="card-img fitImage" alt="...">
                <div class="card-img-overlay">
                  <h2 class="card-body mt-5 ml-4">2000 Users</h5>
                  <p class="card-text ml-5">Last count 3 mins ago</p>
                </div>
              </div>
           </div>
       </div>
   </div>
   <div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
         <div class="card bg-dark text-white">
             <img src="/media/products (1).jpeg" class="card-img" alt="...">
             <div class="card-img-overlay">
                <h2 class="card-body mt-5 ml-4">{{\App\Announcement::TotalCount()}} Announcements</h5>
                    <p class="card-text ml-5">Last count 3 mins ago</p>
             </div>
           </div>
        </div>
    </div>
</div>
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
         <div class="card bg-dark text-white">
             <img src="/media/love.jpeg" class="card-img" alt="...">
             <div class="card-img-overlay">
                <h2 class="card-body mt-5 ml-4">1500 positive ratings</h5>
                <p class="card-text ml-5">Last count 3 mins ago</p>
             </div>
           </div>
        </div>
    </div>
</div>

@push('script')
<script>
let header = document.querySelector('#header')

console.log(header)
setTimeout(function(){ header.classList.add("header_2"); }, 3000);

$('#blogCarousel').carousel({
    interval: 5000
});
</script>
@endpush

@endsection