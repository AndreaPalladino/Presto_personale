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
      <source src="/media/revisorHome.mp4" type="video/mp4">
    </video>
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1  class="display-5 title">Welcome to the</h1>
          <h1 class="text30">Revisor Officine</h1>
        <p class="lead mb-0">you have <span class="text30">{{App\Announcement::toBeRevisioned()}} ads</span> to revise</p>
        </div>
      </div>
    </div>
  </header>
@if($announcement)
  <div class="container my-5 py-5">
    <div class="row">
        <div class="col-md-7">
          @foreach($announcement->images as $image)
            <img class="img-fluid rounded mb-3 mb-md-0" src="{{Storage::url($image->file)}}" alt="">
          @endforeach
        </div>
        <div class="col-md-5 card cardCustom">
          <h3 class="mt-3 text10">{{$announcement->title}}</h3>
          <p class="text-left">Added by: <span class="p text10">{{$announcement->user->name}}</span></p>
          <p>{{$announcement->description}}</p>
        <div class="my-auto">
        <hr class="fluo">
        <form action="{{route('revisor.accept', compact('announcement'))}}" method="post">
            @csrf
            <button class="btn btncustom">Accept</button>
        </form>
        <hr class="fluo">
        <form action="{{route('revisor.reject', compact('announcement'))}}" method="post">
            @csrf
            <button class="btn btncustom2 float-right mb-3">Reject</button>
        </form>
        </div>
        </div>
      </div>
  </div>
@else
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <div class="h2 text-center text30">No ads to revise</div>
        </div>
    </div>
</div>
@endif

@push('script')
<script>
    let header = document.querySelector('#header')
    let title = document.querySelector('#title')

setTimeout(function(){ header.classList.add("header_2"); }, 1000);


});
</script>
@endpush



@endsection