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
	        <div class="panel-heading">Settings</div>
	        <div class="panel-body">
	            <form action="{{ route('settings.update') }}" method="post" >
	            	{{ csrf_field() }}
		            <div class="form-group">
		            	<label for="title">Site name</label>
		            	<input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
		            </div>
		            <div class="form-group">
		            	<label for="title">Contact Number</label>
		            	<input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
		            </div>
		            <div class="form-group">
		            	<label for="title">Email</label>
		            	<input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
		            </div>
		            <div class="form-group">
		            	<label for="title">Address</label>
		            	<input type="text" name="contact_address" class="form-control" value="{{ $settings->contact_address }}">
		            </div>
		            <div class="form-group center">
		            	<button class="btn btn-success">Save</button>
		            </div>
	            </form>
	        </div>
	    </div>
	@stop