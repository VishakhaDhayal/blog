<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
    	$todos	=	Todo::all();
    	return view('todos')->with('todosResult',$todos);
    }

    public function store(Request $request)
    {
    	$todo	=	new Todo;
    	$todo->todo	=	$request->todo;
    	$todo->save();
    	
    	Session::flash('successMsg','Todo was created successfully');

    	return redirect()->back();
    }

    public function delete($id)
    {
    	$todo	=	Todo::find($id);
    	$todo->delete();

    	Session::flash('successMsg','Todo was deleted successfully');
    	return redirect()->back();
    }

    public function update($id)
    {
    	$todo	=	Todo::find($id);
    	return view('update')->with('todo',$todo);
    }

    public function save(Request $request, $id)
    {
    	$todo		=	Todo::find($id);
    	$todo->todo	=	$request->todo;
    	$todo->save();
		Session::flash('successMsg','Todo was updated successfully');
    	return redirect()->back();
    }
}
