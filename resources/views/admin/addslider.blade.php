@extends('layouts.appadmin')

@section('title')
    Add slider
@endsection

@section('content')
@include('include.message')
<form action="{{ route('saveslider') }}" method="post" class="form-horizontal" enctype="multipart/form-data" >
    {{ csrf_field() }}
      <div class="form-group">
        <label for="">Description one</label>
        <input type="text" name="description1" id="" placeholder="Add description one here" class="form-control">
      </div>

      <div class="form-group">
        <label for="">Description two</label>
        <input type="text" name="description2" id="" placeholder="Add description two here" class="form-control">
      </div>

      <div class="form-group">
        <label for="">Select Image</label>
        <input type="File" name="description_image" id="" class="form-control">
          
      </div>

      <input type="submit" class="btn btn-primary" value="Add Slider">

    </form>
@endsection