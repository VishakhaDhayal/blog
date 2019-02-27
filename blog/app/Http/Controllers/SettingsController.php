<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('admin.settings.settings')->with('settings',Settings::first());
	}

    public function update(Request $request)
    {
    	$settings = Settings::first();

    	$settings->site_name		=	$request->site_name;
    	$settings->contact_number	=	$request->contact_number;
    	$settings->contact_email	=	$request->contact_email;
    	$settings->contact_address	=	$request->contact_address;

    	$settings->save();

    	return redirect()->back();
    }
}
