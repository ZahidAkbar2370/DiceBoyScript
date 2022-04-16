<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id ?? 1;
        $users = User::whereNotIn("id", [$user_id])->get();

        return view('Admin.User.all_users',["users" => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('Admin.User.edit_user',["user" => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        if($request->file('image'))
        {
             $name = $request->file('image')->getClientOriginalName();
             $user->avatar = $name;
             $path = $request->file('image')->store('public/images/profile');
             $user->profile_photo_path = $path;
        }

        $user->name = $request->username;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->update();

        Session::flash("message","User Profile Updated Successfully");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $findUser = User::find($id)->delete();

        Session::flash("message","User Deleted Successfully");
        return redirect()->back();
    }
}
