@extends('layouts.appadmin')

@section('title')
    Products
@endsection

@section('content')


{{Form::hidden('',$increment=1)}}
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Data table</h4>
      @include('include.message')
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Order #</th>
                    <th>Product name</th>
                    <th>Product price</th>
                    <th>Product Category</th>
                    <th>Product Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($products as $product)
                      
                  
                <tr>
                    <td>{{$increment}}</td>
                    <td>{{$product->product_name}}</td>
                <td>{{$product->product_price}}</td>
                    <td>{{$product->product_category}}</td>
                    <td><img width="100px" height="100px"  src="{{asset ('storage/product_images')}}/{{$product->product_image}}"></td>
                    
                      @if ($product->status == 1)
                      <td>
                      <label class="badge badge-success">Activated</label>
                    </td>
                    @else
                    <td>
                      <label class="badge badge-danger">Unactiivated</label>
                    </td>
                      @endif
                   
                    
                    <td>
                        
                        <a href="/editproduct/{{$product->id}}"><button class="btn btn-outline-primary">Edit</button></a>
                        <a href="/deleteproduct/{{$product->id}}"><button class="btn btn-outline-danger">Delete</button></a>
                      @if ($product->status == 1)
                    <button class="btn btn-warning"  onclick="window.location = '{{url('unactivate_product/'.$product->id)}}'">Unactivate</button>
                       @else
                    <button class="btn btn-success"  onclick="window.location = '{{url('activate_product/'.$product->id)}}'">Activate</button>
                      @endif
                    </td>
                </tr>
                {{Form::hidden('',$increment= $increment +1)}}
              @endforeach
            </tbody>
          </table>
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
