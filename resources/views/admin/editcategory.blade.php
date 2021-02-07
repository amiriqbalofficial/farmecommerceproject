@extends('layouts.appadmin')

@section('title')
    Edit Categories
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update Cateogry</h4>
        
          
    {{-- action should be route which we use for update --}}
            <form method="post" action="{{ route('category.update', $cat->id) }}">
                
                @csrf
            <div class="form-group">
                <label for="name">Category Name:</label> 
            <input type="string" class="form-control" name="category_name"  value="{{$cat->category_name}}" />
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
