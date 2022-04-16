<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;
use AUth;
use URL;

class UsersController extends Controller
{
	public function index()
	{
		return view('frontend/index');
	}
	public function signup(Request $request)
	{
		Session()->put("previous_url",URL::previous());
		return view('auth/login');
	}
	
	public function edit_profile()
	{
		$id= Session('user_id');
		$user = User::where('id',$id)->first();
		return view('frontend/edit_profile')->with('user_data',$user);
	}

	public function logout()
	{
		Session()->flush();
		return redirect('login');
	}

	public function update_profile(request $request)
	{
		DB::enableQueryLog();
		$validated = $request->validate([
			'username' => 'required|max:255',
		]);
         
         $user = User::find(Session('user_id'));
          

    	if($request->file('image'))
    	{
    		
	         $name = $request->file('image')->getClientOriginalName();
	         $path = $request->file('image')->store('public/images/profile');

	         $user->update(array('name'=>$request->username,'avatar'=>$name,'profile_photo_path'=>$path));
	         Session()->put('user_profile',$path);
	         Session()->put('user_profile',$path);
    	}
    	else
    	{
    		$user->update(array('name' => $request->username));
    	}
		Session()->put('user_name',ucfirst($user->name));
		$request->session()->flash('success','Your profile updated Successfuly');

		 return Redirect()->back();
	}

	public function update_email(request $request)
	{
		$validated = $request->validate([
			'email' => 'required|max:255|unique:users',
		]);
		$user = User::find(Session('user_id'));
		$user->update(array('email' => $request->email));
	
		$request->session()->flash('success','Your email updated Successfuly');
		
		 return Redirect()->back();
	}

	public function update_password(Request $request)
	{
		$validated = $request->validate([
			'password' => 'required|max:255',
			'new_password' => 'required|max:255',
			'password_confirmation' => 'required_with:new_password|same:new_password|min:6',
		]);
		$password = User::where('id',session('user_id'))->first();
		$checkPassword = Hash::check($request->password, $password->password);
		if($checkPassword == true)
		{
		$user = User::find(Session('user_id'));
		$user->update(array('password' => $request->new_password));
	
		$request->session()->flash('success','Your password updated Successfuly');

		 return Redirect()->back();
		}
		else{
			session()->flash('success','Invalid Old Password');

		 	return Redirect()->back();
		}
	}


}
