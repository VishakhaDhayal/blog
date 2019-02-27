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
	            			<th>Edit</th>
	            			<th>Trash</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		@foreach($tags as $tag)
	            			<tr>
	            				<td>{{$tag->name}}</td>
	            				<td><a class="btn btn-success btn-sm" href="">Edit</a></td>
	            				<td><a class="btn-danger btn btn-sm" href="">Trash</a></td>
	            			</tr>
	            		@endforeach
	            	</tbody>
	            </table>
	        </div>
	    </div>
	@stop