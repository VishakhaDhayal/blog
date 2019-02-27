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
	            <table class="table">
	            	<thead>
	            		<tr>
	            			<th>Name</th>
	            			<th>Image</th>
	            			<th>Edit</th>
	            			<th>Trash</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		@foreach($posts as $post)
	            			<tr>
	            				<td>{{$post->title}}</td>
	            				<td><img src="{{$post->featured}}" width="70" height="50"></td>
	            				<td><a class="btn btn-success btn-sm" href="{{ route('post.edit', ['id'=>$post->id]) }}">Edit</a></td>
	            				<td><a class="btn-danger btn btn-sm" href="{{ route('post.trash', ['id'=>$post->id]) }}">Trash</a></td>
	            			</tr>
	            		@endforeach
	            	</tbody>
	            </table>
	        </div>
	    </div>
	@stop