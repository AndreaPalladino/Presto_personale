@extends('layouts.app')
@section('style')
    
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









@endsection