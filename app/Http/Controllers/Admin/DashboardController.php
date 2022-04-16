<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $count = [
            'users' => User::count(),
            'comments' => Comment::count(),
            'scripts' => Post::count(),
            'pendingScripts' => Post::where("status","pending")->count(),
            'approvedScripts' => Post::where("status","approved")->count(),
            'declinedScripts' => Post::where("status","declined")->count(),
        ];

        return view("Admin.Dashboard.dashboard",["count" => $count]);
    }
}
