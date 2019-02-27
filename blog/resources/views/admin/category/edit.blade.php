@extends('layouts.app')
	@section('content')
		<div class="panel panel-default">
	        <div class="panel-heading">Category Edit</div>
	        <div class="panel-body">

	        <form action="{{ route('category.update', ['id'=> $categoryRecord->id])}} " method="post">
	        	{{ csrf_field() }}
	        	<input type="text" name="category" value="{{ $categoryRecord->name }}">
				<input type="submit" name="editCategory" value = "update">	     				

			</form>	
	        </div>
	    </div>
	@stop