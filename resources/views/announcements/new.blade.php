@extends('layouts.app')
@section('style')
<style>
    body{
        background: linear-gradient(180deg, black 50%, var(--trenta));
        height: 100vh;
    }
</style>
@endsection
@section('content')
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-12">
            <form action="{{route('ann.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="text30 mt-3">Title</label>
                      <input name="title" type="text" class="form-control border-custom bg-transparent" id="exampleFormControlInput1" value="{{old('title')}} ">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1" class="text30 mt-3">Category</label>
                      <select name="category" class="form-control textBorder bg-transparent" id="exampleFormControlSelect1">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected' : ''}}>{{$category->name}}
                            </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1" class="text30 mt-3">Description</label>
                      <textarea name="description" class="form-control textBorder bg-transparent" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
                    </div>
                    <button type="submit" class="btn btncustom mx-auto d-block mt-5">Create</button>
                  </form>
            </div>
        </div>
    </div>
@endsection