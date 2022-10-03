<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::id())
        {
            if(Auth::User()-> usertype == '0')
            {
                  return view('home');
            }else{
                return view('admin.myadmin');
            }

        }else{

            return redirect()-> back();
        }

        //return view('home');
    }
}
