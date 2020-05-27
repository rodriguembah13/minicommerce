@extends('layouts.admin.app')


@section('content')

     
     {{-- @include('admin.includes.errors')--}}

<div class="panel panel-default">
      <div class="panel-heading">
      	Create a New Tag
      </div>

      <div class="panel-body">
      	<form action="{{ route('tag.store') }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="tag">Tag Name</label>
            	<input type="text" name="tag" placeholder="Enter Your Blog Category Name" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Create Category</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop