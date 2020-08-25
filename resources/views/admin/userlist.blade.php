@extends('layouts.app')
@section('style')
    <style>
        body{
            background-color: black;
        }
    </style>
@endsection
@section('content')
    

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table border-custom">
                    <thead>
                      <tr>
                        <th scope="col" class="text10">#</th>
                        <th scope="col" class="text10">Name</th>
                        <th scope="col" class="text10">Email</th>
                        <th scope="col" class="text10">Handle</th>
                      </tr>
                    </thead>
                    <tbody class="border-custom">
                      <tr>
                          @foreach ($users as $user)
                      <th scope="row">{{$user->id}}</th>
                          <td class="text30">{{$user->name}}</td>
                          <td class="text30">{{$user->email}}</td>
                          @if($user->is_revisor == false)
                      <form action="{{route('make.revisor', [$user->id])}}" method="post">
                        @csrf
                        <td><button class="btn btncustom2">MakeRevisor</button></td>
                      </form>
                          @else
                          <form action="{{route('unMake.revisor', [$user->id])}}" method="post">
                            @csrf
                            <td><button class="btn btncustom">UnMakeRevisor</button></td>
                          </form>
                          @endif
                          @endforeach
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>




@endsection