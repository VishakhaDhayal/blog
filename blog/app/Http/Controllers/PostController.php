<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Auth;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories',Category::all())
                                         ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255',
            'featured'=>'required|image',
            'category_id'=>'required',
            'content'=>'required',
            'tags'=>'required'
        ]);

        $featured       =   $request->featured;
        $newFeatured    =   time().$featured->getClientOriginalName();
        
        $featured->move('uploads/posts',$newFeatured);
        $post = Post::create([
                    'title'         =>  $request->title,
                    'content'       =>  $request->content,
                    'category_id'   =>  $request->category_id,
                    'slug'          =>  str_slug($request->title),
                    'featured'      =>  'uploads/posts/' . $newFeatured,
                    'user_id'       =>  Auth::id()
                ]);

        $post->tags()->attach($request->tags);
        Session::flash('success','Post has been created succcessfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post       =   Post::find($id);
        $categories =   Category::all();
        // dd($post);
        return view('admin.posts.edit')->with('posts',$post)->with('categories',$categories)->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'title'=>'required|max:255',
           'featured'=>'image',
           'category_id'=>'required',
           'content'=>'required'
        ]);

        $post   =   Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured   =   $request->featured;
            $featuredPostName   =   time().$featured->getClientOriginalName();

            $featured->move('uploads/posts',$featuredPostName);
            $post->featured =   'uploads/posts/'.$featuredPostName;
        }

        $post->title          =   $request->title;
        $post->category_id    =   $request->category_id;
        $post->content        =   $request->content;

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post   =   POST::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        Session::flash('success', 'Post was deleted successfully.');
        return redirect()->back();
    }

    public function trash($id)
    {
        $post   =   Post::find($id);
        $post->delete();

        Session::flash('success','Post was trashed successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        $posts  =   Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function restore($id)
    {
        $post   =   POST::withTrashed()->where('id',$id)->first();
        $post->restore();

        Session::flash('success', 'Post was restored successfully.');
        return redirect()->route('posts');
    }
}
