@extends('layouts.appadmin')

@section('title')
    Add Categories
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Category</h4>
          @include('include.message')
          {!!Form::open(['action' => 'categoryController@savecategory', 'method' => 'POST', 'class' =>'form-horizontal'])!!}
        {{ csrf_field() }}

        <div class="form-group">
            {{Form::label('', 'Add category')}}
            {{Form::text('category_name', '', ['placeholder' => 'category Name','class' => 'form-control'])}}
        </div>
        
       

        {{Form::submit('Add category', ['class' => 'btn btn-primary'])}}

    {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>

@endsection


         