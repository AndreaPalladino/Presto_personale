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
        <form action="{{route('contact.submit')}}" method="POST">
                @csrf
                
                <div class="form-group">
                  <label for="exampleFormControlInput1" class="text30 mt-3">Name</label>
                  <input name="name" type="text" class="form-control border-custom bg-transparent" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2" class="text30 mt-3">email</label>
                    <input name="email" type="text" class="form-control border-custom bg-transparent" id="exampleFormControlInput2" >
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1" class="text30 mt-3">Request</label>
                  <textarea name="request" class="form-control textBorder bg-transparent" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                
                <button type="submit" class="btn btncustom mx-auto d-block mt-5">Ask</button>
              </form>
        </div>
    </div>
</div>
@endsection