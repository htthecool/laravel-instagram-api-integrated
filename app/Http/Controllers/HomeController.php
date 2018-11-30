<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('guest');
	}

    public function home()
    {
    	if(Session::get('instagramToken'))
    	{
    		return redirect('/dashboard');
    	}
    	else
    	{
    		return view('welcome');
    	}
    }

    public function dashboard()
    {
    	return view('dashboard');
    }
}
