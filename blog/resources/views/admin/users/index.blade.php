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
	        <div class="panel-heading">
	        	<div class="pull-left">Users</div>
	        	<div class="pull-right"><a href="{{ route('users.create') }}" class="btn btn-xs btn-success">Add New User</a></div>
	        	<div class="clearfix"></div>
	        </div>
	        <div class="panel-body">
	            <table class="table">
	            	<thead>
	            		<tr>
	            			<th>Name</th>
	            			<th>Avatar</th>
	            			<th>Permissions</th>
	            			<th>Edit</th>
	            			<th>Delete</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		@foreach($users as $user)
	            			<tr>
	            				<td>{{$user->name}}</td>
	            				<td><img src="{{ asset($user->profile->avatar) }}" width="75" height="50"></td>
	            					@if($user->admin)
	            						<td><a class="btn btn-danger btn-sm" href="{{ route('users.not.admin',['id'=>$user->id]) }}">Remove permission</a></td>
	            					@else
	            						<td><a class="btn btn-success btn-sm" href="{{ route('users.admin',['id'=>$user->id]) }}">Make admin</a></td>
	            					@endif
	            				<td><a class="btn btn-success btn-sm" href="">Edit</a></td>
	            				<td>
	            					@if(Auth::id() != $user->id)
	            						<a class="btn-danger btn btn-sm" href="{{ route('users.delete',['id'=>$user->id]) }}">Delete</a>
	            					@else
	            						---
	            					@endif
	            				</td>
	            			</tr>
	            		@endforeach
	            	</tbody>
	            </table>
	        </div>
	    </div>
	@stop

	