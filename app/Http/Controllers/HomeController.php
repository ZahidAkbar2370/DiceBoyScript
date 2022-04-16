<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth::user()->role == "admin"){
            return redirect('admin/profile');
        }
        else if(auth::user()->role == "user"){
            Session()->put('user_id',auth()->user()->id);
            Session()->put('user_profile',auth()->user()->profile_photo_path);
            Session()->put('user_name',auth()->user()->name);
            Session()->put('user_email',auth()->user()->email);

            if(Session::has('previous_url')){
                $previous = Session('previous_url');
                Session::forget('previous_url');
                return redirect($previous);
            }

            return redirect('addscript');
        }
    }
}
