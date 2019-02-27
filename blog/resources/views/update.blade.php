@extends('layout')

@section('title')
    Update Todo
@stop

@section('content')
    <div class="">
        <form action="{{route('todos.save',['id'=>$todo->id])}}" method="post"> 
            {{ csrf_field() }}
            <input type="text" name="todo" value="{{$todo->todo}}">
            <input type="submit" name="submit" value="Save"/>
        </form>
    </div>
@stop