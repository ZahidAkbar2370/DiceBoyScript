<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Session;

class ScriptController extends Controller
{
    public function index()
    {
        $scripts = Post::all();

        return view('Admin.Script.all_scripts',["scripts" => $scripts]);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('Admin.Script.edit_script',["post" => $post]);
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->script = $request->script;
        $post->result = $request->result;
        $post->update();

        Session::flash("message","Script Updated Successfully");
        return redirect('admin/all-scripts');
    }

    public function destroy($id)
    {
        $findPost = Post::find($id)->delete();

        Session::flash("message","Script Deleted Successfully");
        return redirect()->back();
    }

    public function pendingScript()
    {
        $scripts = Post::where("status","pending")->get();

        return view('Admin.Script.all_scripts',["scripts" => $scripts]);
    }

    public function approvedScript()
    {
        $scripts = Post::where("status","approved")->get();

        return view('Admin.Script.all_scripts',["scripts" => $scripts]);
    }

    public function declinedScript()
    {
        $scripts = Post::where("status","declined")->get();

        return view('Admin.Script.all_scripts',["scripts" => $scripts]);
    }

    public function approveScriptStatus($id)
    {
        $findPost = Post::find($id);

        $findPost->status = "approved";
        $findPost->update();

        Session::flash("message","Script Status Updated Successfully");
        return redirect()->back();        
    }

    public function declineScriptStatus($id)
    {
        $findPost = Post::find($id);

        $findPost->status = "declined";
        $findPost->update();

        Session::flash("message","Script Status Updated Successfully");
        return redirect()->back();        
    }
}
