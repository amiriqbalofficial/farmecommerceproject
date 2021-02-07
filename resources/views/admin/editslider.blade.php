@extends('layouts.appadmin')

@section('title')
   Edit slider
@endsection

@section('content')
@include('include.message')
<form action="{{ route('slider.update',$slider->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" >
    @csrf
    
      <div class="form-group">
        <input type="hidden" name="id" value="{{$slider->id}}">
        <label for="">Description one</label>
      <input type="text" name="description1" id=""  class="form-control" value="{{$slider->description1}}">
      </div>

      <div class="form-group">
        <label for="">Description two</label>
        <input type="text" name="description2" id=""  class="form-control" value="{{$slider->description1}}">
      </div>

      <div class="form-group">
        <label for="">Select Image</label>
        <input type="File" name="slider_image" id="" class="form-control">
          
      </div>

      <input type="submit" class="btn btn-primary" value="Update Slider">

    </form>
@endsection