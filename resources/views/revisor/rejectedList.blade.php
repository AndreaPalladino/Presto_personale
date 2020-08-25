@extends('layouts.app')
@section('style')
    <style>
        body{
            background-color: black;
        }
    </style>
@endsection
@section('content')

@if($announcements)
<div class="container my-5 py-5">
    <div class="row">
        @foreach($announcements as $announcement)
        <div class="col-md-7 mb-5">
              
              <img src="{{$announcement->images->first()->getUrl(300,150)}}" class="d-block w-100">
              
        </div>
        <div class="col-md-5 card cardCustom mb-5">
          <h3 class="mt-3 text10">{{$announcement->title}}</h3>
          <p class="text-left">Added by: <span class="p text10">{{$announcement->user->name}}</span></p>
          <p>{{$announcement->description}}</p>
        
        
        <hr class="fluo">
        <form action="{{route('rejected.accept', compact('announcement'))}}" method="post">
            @csrf
            <button class="btn btncustom">Accept</button>
        </form>
        <hr class="fluo">
        <form action="{{route('rejected.remove', compact('announcement'))}}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btncustom2 float-right mb-3">Delete</button>
        </form>
       
        
        </div>
        @endforeach
      </div>
  </div>
  @else
  <div class="container my-5 py-5">
      <div class="row">
          <div class="col12">
              <h3 class="text30 text-center">No rejected ads</h3>
          </div>
      </div>
  </div>
  @endif
@endsection