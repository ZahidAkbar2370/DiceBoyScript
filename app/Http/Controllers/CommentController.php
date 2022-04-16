<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    	public function question_detail($q_id)
	{
		DB::enableQueryLog();
		$data = DB::table('posts')
		->join('users', 'posts.user_id', '=', 'users.id')
		->where('posts.id',$q_id)
		->select('posts.*', 'users.name', 'users.email')
		->orderBy('created_at','DESC')
		->get();

		$comment = Comment::where('question_id',$q_id)->get();
		
		return view('frontend/question_detail_page')->with('posts',$data);
	}
	public function save_comment(Request $request)
	{
		$data = $request->input();
		$data['commented_user_id'] = Session('user_id');
		$comment = new Comment();
		$comment->question_id = $data['script_id'];
		$comment->commented_user_id = $data['commented_user_id'];
		$comment->comment_to_user_id = $data['comment_to_user_id'];
		$comment->comment = $data['comment'];
		$comment->save();

		$request->session()->flash('success','Your comment added Successfuly');
		return redirect()->back();
	}
}
