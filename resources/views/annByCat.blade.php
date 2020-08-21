@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    @if($announcements->isNotEmpty())


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