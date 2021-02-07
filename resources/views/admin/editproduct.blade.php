@extends('layouts.appadmin')

@section('title')
    Edit Products
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update Products</h4>
        
          
    {{-- action should be route which we use for update --}}
            <form method="post" action="{{ route('product.update', $pro->id) }}" enctype="multipart/form-data">
              
                
                @csrf
            <div class="form-group">
            <input type="hidden" name="id" value="{{$pro->id}}">
                <label for="name">Product Name:</label> 
            <input type="string" class="form-control" name="product_name"  value="{{$pro->product_name}}" />
            </div> 
            <div class="form-group">
                <label for="name">Product Price:</label> 
            <input type="string" class="form-control" name="product_price"  value="{{$pro->product_price}}" />
            </div> 
            <div class="form-group">
                {{ Form::label('', 'Select Category') }}
                {!! Form::select('product_category', $categories,$pro->product_category, ['class' => 'form-control']) !!}
               </div>
              
            <div class="form-group">
                <label for="name">Product Image:</label> 
            <input type="file" class="form-control" name="product_image"   />
            </div> 
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
        </div>
      </div>
    </div>
  </div>

@endsection

<script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('backend/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('backend/js/template.js')}}"></script>
  <script src="{{asset('backend/js/settings.js')}}"></script>
  <script src="{{asset('backend/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('backend/js/data-table.js')}}"></script>
  <!-- End custom js for this page-->
