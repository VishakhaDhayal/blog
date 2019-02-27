@extends('layouts.app')
	@section('content')
		<div class="panel panel-default">
	        <div class="panel-heading">Category Listing</div>
	        <div class="panel-body">
	            <table class="table">
	            	<thead>
	            		<tr>
	            			<th>Name</th>
	            			<th>Edit</th>
	            			<th>Delete</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		@foreach($categories as $category)
	            			<tr>
	            				<td>{{$category->name}}</td>
	            				<td><a href="{{ route('category.edit', ['id'=>$category->id]) }}">Edit</a></td>
	            				<td><a href="{{ route('category.delete', ['id'=>$category->id]) }}">Delete</a></td>
	            			</tr>
	            		@endforeach
	            	</tbody>
	            </table>
	        </div>
	    </div>
	@stop