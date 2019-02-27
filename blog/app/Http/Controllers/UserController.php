<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Session;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'user_name' => 'required',
            'user_email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar'  => 'uploads/avatar/java.png',
            'about' => $request->about,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube
        ]);

        Session::flash('success','User has been created successfully.');

        return redirect()->route('users');
    }


    public function not_admin($id)
    {
        $user =   User::find($id);
        $user->admin = 0;
        $user->save();

        Session::flash('success','Permission changed successfully');
        return redirect()->back();
    }

    public function admin($id)
    {
        $user =   User::find($id);
        $user->admin = 1;
        $user->save();

        Session::flash('success','Admin created successfully');
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
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile()->delete();
        $user->delete();

        Session::flash('success','User deleted successfully');

        return redirect()->back();
    }
}
