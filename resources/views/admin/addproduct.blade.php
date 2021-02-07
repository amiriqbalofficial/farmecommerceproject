@extends('layouts.appadmin')

@section('title')
    Add Product
@endsection

@section('content')
@include('include.message')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Product</h4>

          {{-- work left here have to prototype here to the form for image --}}

          <form action="{{ route('save.product') }}" method="post" class="form-horizontal" enctype="multipart/form-data" >
            {{ csrf_field() }}
              <div class="form-group">
                <label for="">Add Product</label>
                <input type="text" name="product_name" id="" placeholder="Product name" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Product Price</label>
                <input type="number" name="product_price" id="" placeholder="Product price" class="form-control">
              </div>

              
              <div class="form-group">
                {{ Form::label('', 'Select Category') }}
                {!! Form::select('product_category', $categories,null, ['class' => 'form-control','placeholder'=>'select Category']) !!}
               </div>
              

              

              <div class="form-group">
                <label for="">Select Product Image</label>
                <input type="File" name="product_image" id="" class="form-control">
                  
              </div>

              <input type="submit" class="btn btn-primary" value="Add Product">
    
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
         