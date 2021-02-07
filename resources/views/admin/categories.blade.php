@extends('layouts.appadmin')
@section('title')
    Categories
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
                    <th>Category name</th>
                    
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($data as $data)
                  <tr>
                    <td>{{$increment}}</td>
                  <td>{{$data->category_name}}</td>
                    
                    
                    <td>
                    <a href="/editcategory/{{$data->id}}"><button class="btn btn-outline-primary">Edit</button></a>
                    <a href="/delete/{{$data->id}}"><button type="submit" class="btn btn-outline-primary" onclick="if (!confirm('Are you sure?')) { return false }"><span>Delete</span></button></a>
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