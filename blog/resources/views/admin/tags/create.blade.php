@extends('layouts.app')
	@section('content')
        @if(count($errors))
        	<ul class="list-group">
        		@foreach($errors->all() as $error)
        			<li class="list-group-item text-danger">{{ $error }}</li>
        		@endforeach
        	</ul>
        @endif

        @if(Session::has('success'))
        	<div class="success-msg">{{ Session::get('success') }}</div>
        @endif
		<div class="panel panel-default">
	        <div class="panel-heading">Create New Tag</div>
	        <div class="panel-body">
	            <form action="{{ route('tags.store') }}" method="post" enctype="multipart/form-data">
	            	{{ csrf_field() }}
		            <div class="form-group">
		            	<label for="title">Tag name</label>
		            	<input type="text" name="tag_name" class="form-control">
		            </div>
		            <div class="form-group center">
		            	<button class="btn btn-success">Save</button>
		            </div>
	            </form>
	        </div>
	    </div>
	@stop