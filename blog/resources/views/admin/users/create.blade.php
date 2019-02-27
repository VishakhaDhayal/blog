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
	        <div class="panel-heading">Create New User</div>
	        <div class="panel-body">
	            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
	            	{{ csrf_field() }}
		            <div class="form-group">
		            	<label for="user_name">User name</label>
		            	<input type="text" name="user_name" class="form-control">
		            </div>
		            <div class="form-group">
		            	<label for="user_email">Email</label>
		            	<input type="text" name="user_email" class="form-control">
		            </div>
		            <div class="form-group">
		            	<label for="password">Password</label>
		            	<input type="text" name="password" class="form-control">
		            </div>
		            <div class="form-group">
		            	<label for="confirm_password">Confirm Password</label>
		            	<input type="text" name="confirm_password" class="form-control">
		            </div>
		            <div class="form-group">
		            	<label for="about">About</label>
		            	<textarea name="about" id="content" class="form-control"></textarea>
		            	<!-- <input type="text" name="about" class="form-control"> -->
		            </div>
		            <div class="form-group">
		            	<label for="facebook">Facebook</label>
		            	<input type="text" name="facebook" class="form-control">
		            </div>
		            <div class="form-group">
		            	<label for="youtube">Youtube</label>
		            	<input type="text" name="youtube" class="form-control">
		            </div>
		            <div class="form-group">
		            	<label for="youtube">Avatar</label>
		            	<input type="file" name="avatar" >
		            </div>
		            <div class="form-group center">
		            	<button class="btn btn-success">Save</button>
		            </div>
	            </form>
	        </div>
	    </div>
	@stop

	@section('styles')
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
	@stop


	@section('scripts')

		<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			  $('#content').summernote();
			});
		</script>
	@stop