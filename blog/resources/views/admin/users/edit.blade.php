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
	            <form action="{{ route('post.update',['id'=>$posts->id]) }}" method="post" enctype="multipart/form-data">
	            	{{ csrf_field() }}
		            <div class="form-group">
		            	<label for="title">Title</label>
		            	<input type="text" name="title" class="form-control" value="{{ $posts->title }}">
		            </div>
		            <div class="form-group center">
		            	<button class="btn btn-success">Save</button>
		            </div>
	            </form>
	        </div>
	    </div>
	@stop