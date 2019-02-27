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
	            <table class="table">
	            	<thead>
	            		<tr>
	            			<th>Name</th>
	            			<th>Restore</th>
	            			<th>Delete</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		@if($tags->count() > 0)
	            			@foreach($tags as $tag)
		            			<tr>
		            				<td>{{$tag->name}}</td>
		            				<td><a class="btn-success btn btn-xs" href="{{ route('tag.restore', ['id'=>$tag->id]) }}">Restore</a></td>
		            				<td><a class="btn-danger btn btn-xs" href="{{ route('tag.delete', ['id'=>$tag->id]) }}">Delete</a></td>
		            			</tr>
		            		@endforeach
	            		@else
	            			<tr>
	            				<td colspan="4" class="text-center">No trashed post found in our database.</td>
	            			</tr>
	            		@endif
	            	</tbody>
	            </table>
	        </div>
	    </div>
	@stop