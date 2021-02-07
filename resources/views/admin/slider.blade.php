@extends('layouts.appadmin')

@section('title')
    Add slider
@endsection

@section('content')


{{Form::hidden('',$increment=1)}}
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Slider table</h4>
      @include('include.message')
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Order #</th>
                    <th>Description one</th>
                    <th>Description two</th>
                    <th>Slider Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                    @foreach ($slider as $slider)
                    <tr>
                        <td>{{$increment}}</td>
                    <td>{{$slider->description1}}</td>
                    <td>{{$slider->description2}}</td>
                    <td><img width="100px" height="100px"  src="{{asset ('storage/slider_images')}}/{{$slider->slider_image}}"></td>
                    @if ($slider->status == 1)
                      <td>
                      <label class="badge badge-success">Activated</label>
                    </td>
                    @else
                    <td>
                      <label class="badge badge-danger">Unactiivated</label>
                    </td>
                      @endif
                   
                    
                    <td>
                        
                        <a href="/editslider/{{$slider->id}}"><button class="btn btn-outline-primary">Edit</button></a>
                        <a href="deleteslider/{{$slider->id}}"><button class="btn btn-outline-danger">Delete</button></a>
                        @if ($slider->status == 1)
                        <button class="btn btn-warning"  onclick="window.location = '{{url('unactivate_slider/'.$slider->id)}}'">Unactivate</button>
                           @else
                        <button class="btn btn-success"  onclick="window.location = '{{url('activate_slider/'.$slider->id)}}'">Activate</button>
                          @endif
                        </td>
                    </tr>
                    </td>
                    </tr>
                    {{Form::hidden('',$increment= $increment +1)}}
                    @endforeach
               
              </thead>
              <tbody>
                  
                </tr>
               
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
