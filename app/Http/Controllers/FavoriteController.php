<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::where("user_id", Session('user_id'))->get();

        return view("frontend.favorites",["favorites" => $favorites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($script_id)
    {
        $user_id = Session('user_id');

        Favorite::create([
            "user_id" => $user_id,
            "script_id" => $script_id,
        ]);

        Session::flash("success","Script Favorite Successfully");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy($script_id)
    {
        $favorites = Favorite::where("script_id", $script_id)->where("user_id", Session('user_id'))->first();

        $favorites->delete();

        return redirect()->back();
    }

    public function favoriteScripts()
    {
        $favorites = Favorite::where("user_id", Session('user_id'))
                                ->with("posts")
                                ->with("users")
                                ->get();

        return view("frontend.favorite_scripts",["favorites" => $favorites]);
    }
}
