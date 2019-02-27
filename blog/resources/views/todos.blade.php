@extends('layout')

@section('title')
    Todos List
@stop

@section('content')
    @if(Session::has('successMsg'))
        <div class="success-msg">{{ Session::get('successMsg') }}</div>
    @endif
    <div class="">
        <form action="/create-todo" method="post"> 
            {{ csrf_field() }}
            <input type="text" name="todo">
            <input type="submit" name="submit" value="Save"/>
        </form>
    </div>
    @foreach($todosResult as $todos)
        <div>
            {{ $todos->todo }} 
            <a href="{{ route('todos.update', ['id'=>$todos->id]) }}">Update</a>
            <a href="{{ route('todos.delete', ['id'=>$todos->id]) }}">Delete</a>
        </div>
    @endforeach
@stop