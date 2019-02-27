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
	        <div class="panel-heading">Create New Post</div>
	        <div class="panel-body">
	            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
	            	{{ csrf_field() }}
		            <div class="form-group">
		            	<label for="title">Title</label>
		            	<input type="text" name="title" class="form-control">
		            </div>
		            <div class="form-group">
		            	<label for="category_id">Select Category</label>
		            	<select class="form-control" name="category_id">
		            		<option value=""> Select Category </option>
		            		@foreach($categories as $cat)
		            			<option value="{{$cat->id}}"> {{$cat->name}} </option>
		            		@endforeach
		            	</select>
		            </div>
		            <div class="form-group">
		            	<label for="tags">Select Tags</label>
		            		@foreach($tags as $tag)
		            			<input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{ $tag->name }}
		            		@endforeach
		            </div>
		            <div class="form-group">
		            	<label for="featured">Featured Image</label>
		            	<input type="file" name="featured" class="form-control">
		            </div>
		            <div class="form-group">
		            	<label for="content">Content</label>
		            	<textarea rows="4" cols="4" name="content" class="form-control"></textarea>
		            </div>
		            <div class="form-group center">
		            	<button class="btn btn-success">Save</button>
		            </div>
	            </form>
	        </div>
	    </div>
	@stop