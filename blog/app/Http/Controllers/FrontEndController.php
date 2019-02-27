<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;



class FrontEndController extends Controller
{
	public function index()
	{
		return view('index')->with('title',Settings::first()->site_name)
			->with('categories',Category::all())
			->with('first_post',Post::orderby('created_at','desc')->first())
			->with('recent_post',Post::orderby('created_at','desc')->skip(1)->take(2)->get())
			->with('painting',Category::find(3));
	}

	public function singlePost($slug)
	{
		$post = Post::where('slug',$slug)->first();
		$prev = Post::where('id','<',$post->id)->max('id');
		$next = Post::where('id','>',$post->id)->min('id');

		return view('singlepost')->with('title',Settings::first()->site_name)
		->with('categories',Category::all())
		->with('post',$post)
		->with('next',Post::find($next))
		->with('prev',Post::find($prev));
	}

	public function category($id)
	{
		$category	=	Category::find($id);

		return view('category')->with('category',$category)
				->with('categories',Category::all())
				->with('title',Settings::first()->site_name);
	}

	public function searchResults(Request $request)
	{
		$post	=	Post::where('title','like','%'.$request->search_query.'%')->get();
		return view('searchresults')
				->with('posts',$post)
				->with('title',Settings::first()->site_name)
				->with('categories',Category::all())
				->with('results','Search Results for '.$request->search_query);
	}
}
