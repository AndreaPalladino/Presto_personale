@extends('layouts.app')
@section('style')
    <style>
        body{
            background-color: black;
        }
    </style>
@endsection
@section('content')
    @if($announcements->isNotEmpty())
      
    <div class="container my-5 py-5">
        <div class="row">
            @foreach ($announcements as $announcement)
           <div class="col-12 col-md-6 col-lg-4 mb-4">

            <div class="card cardCustom h-100">
                <a href="#"><img class="card-img-top" src="{{$announcement->images->first()->getUrl(300,150)}}" alt=""></a>
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

    @else
    <div class="container my 5 py-5">
        <div class="row mt-5">
            <div class="col-12">
            <h1 class="text-center text-dark">Still no announcements for <span class="text10 h1">{{$category->name}}</span> category</h1>
            </div>
        </div>
    </div>
    @endif
@endsection