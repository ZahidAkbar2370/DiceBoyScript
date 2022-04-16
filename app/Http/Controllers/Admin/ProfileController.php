<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('Admin.Profile.edit_profile');
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id ?? 0; 

        $user = User::find($id);

        if($request->file('image'))
        {
             $name = $request->file('image')->getClientOriginalName();
             $user->avatar = $name;
             $path = $request->file('image')->store('public/images/profile');
             $user->profile_photo_path = $path;
             // $user->update(array('name'=>$request->username,'avatar'=>$name,'profile_photo_path'=>$path));
        }

        $user->name = $request->username;
        $user->update();

        Session::flash('message', 'Profile Updated Successfully');
        return redirect()->back();
    }
}
