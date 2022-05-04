<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use DB;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Favorite;
use Illuminate\Support\Facades\URL;
use Session;

class PostController extends Controller
{
	public function index()
	{
		
		$data = Post::with('users')
				->with('rating')
				->with('comment')
				->orderBy("id", "DESC")
				->paginate(25)
				;

		$comments = [];
		$stars = [];
		foreach ($data as $key => $value) {
			array_push($comments,count($value->comment));
			$sum_one_star = 0;
			$sum_two_star = 0;
			$sum_three_star = 0;
			$sum_four_star = 0;
			$sum_five_star = 0;
			$score = 0;
			$total_score = 0;
			$average = 0;
			foreach ($value['rating'] as $key => $star) {

				if($star->rating == 1){
					$sum_one_star += 1;
				}
				else if($star->rating == 2){
					$sum_two_star += 1;
				}
				else if($star->rating == 3){
					$sum_three_star += 1;
				}
				else if($star->rating == 4){
					$sum_four_star += 1;
				}
				else if($star->rating == 5){
					$sum_five_star += 1;
				}
					
			}

			$total_score += $sum_one_star * 1 + $sum_two_star * 2 + $sum_three_star * 3 + $sum_four_star * 4 + $sum_five_star * 5;
			$score += $sum_one_star + $sum_two_star + $sum_three_star + $sum_four_star + $sum_five_star;

			if($total_score != 0 && $score != 0){
				$average = ($total_score/$score);
			}
				array_push($stars, intval($average));
			}

		return view('frontend/index')
			->with('posts',$data)
			->with('comments',$comments)
			->with('stars',$stars);
	}

	public function about()
	{
		return view('frontend/about');
	}
	public function userpost()
	{
		$posts = Post::where('user_id',session('user_id'))->with('comment')->get();

		$count_comments = Comment::where("commented_user_id",session('user_id'))->count();

		$comments = [];
		$stars = [];
		foreach ($posts as $key => $value) {
			array_push($comments,count($value->comment));
			$sum_one_star = 0;
			$sum_two_star = 0;
			$sum_three_star = 0;
			$sum_four_star = 0;
			$sum_five_star = 0;
			$score = 0;
			$total_score = 0;
			$average = 0;
			foreach ($value['rating'] as $key => $star) {

				if($star->rating == 1){
					$sum_one_star += 1;
				}
				else if($star->rating == 2){
					$sum_two_star += 1;
				}
				else if($star->rating == 3){
					$sum_three_star += 1;
				}
				else if($star->rating == 4){
					$sum_four_star += 1;
				}
				else if($star->rating == 5){
					$sum_five_star += 1;
				}
					
			}

			$total_score += $sum_one_star * 1 + $sum_two_star * 2 + $sum_three_star * 3 + $sum_four_star * 4 + $sum_five_star * 5;
			$score += $sum_one_star + $sum_two_star + $sum_three_star + $sum_four_star + $sum_five_star;

			if($total_score != 0 && $score != 0){
				$average = ($total_score/$score);
			}
				array_push($stars, intval($average));
			}

		return view('frontend/add_script')
				->with('posts',$posts)
				->with('count_comments',$count_comments)
				->with('comments',$comments)
				->with('stars',$stars);
	}
	public function add_post(Request $request)
	{
		$validated = $request->validate([
			'title' => 'required|max:255',
			'description' => 'required',
			'script' => 'required',
		]);
		$data=$request->input();
		$post_data=new post();
		$post_data->user_id =session('user_id');
		$post_data->title =$data['title'];
		$post_data->description=$data['description'];
		$post_data->script  =$data['script'];
		
		$post_data->save();
		$request->session()->flash('success','You are register Successfuly');
		return redirect()->back();
	}

	public function selectBy(Request $request)
	{
		$colum='id';
		$order='DESC';

		if($request->showByorder=='1')
		{
			$colum='created_at';
			$order='DESC';
		}
		else if($request->showByorder=='2')
		{
			$colum='created_at';
			$order='ASC';
			
		}
		else if($request->showByorder=='3')
		{
			$colum='title';
			$order='ASC';
		}
		else if($request->showByorder=='4')
		{
			$colum='title';
			$order='DESC';
		}

		$posts = Post::with('users')
				->with('rating')
				->orderBy($colum, $order)
				->get();

		$stars = [];
		foreach ($posts as $postDataKey => $value) {

			$sum_one_star = 0;
			$sum_two_star = 0;
			$sum_three_star = 0;
			$sum_four_star = 0;
			$sum_five_star = 0;
			$score = 0;
			$total_score = 0;
			$average = 0;
			foreach ($value['rating'] as $key => $star) {

				if($star->rating == 1){
					$sum_one_star += 1;
				}
				else if($star->rating == 2){
					$sum_two_star += 1;
				}
				else if($star->rating == 3){
					$sum_three_star += 1;
				}
				else if($star->rating == 4){
					$sum_four_star += 1;
				}
				else if($star->rating == 5){
					$sum_five_star += 1;
				}
					
			}

			$total_score += $sum_one_star * 1 + $sum_two_star * 2 + $sum_three_star * 3 + $sum_four_star * 4 + $sum_five_star * 5;
			$score += $sum_one_star + $sum_two_star + $sum_three_star + $sum_four_star + $sum_five_star;

			if($total_score != 0 && $score != 0){
				$average = ($total_score/$score);
			}
				$rate = [
							"script_id" => $value->id,
							"average" => intval($average),
						];
				array_push($stars, $rate);
			}
			
			
			
			$array_for_index = [];
			$unset_stars_array = $stars;
			if($request->showByorder=='5'){
			
				$totalItems = count($stars);
				$max = 0;
				$unset_star_index = 0;
				for($i = 0; $i < $totalItems; $i++){
					
					foreach($unset_stars_array as $unsetStarKey => $unset_star){
						if($max <= $unset_star['average']){
							$max = $unset_star['average'];
							$unset_star_index = $unsetStarKey;
						}
					}

					unset($unset_stars_array[$unset_star_index]);
					array_push($array_for_index, $unset_star_index);
					$max = 0;
				}
			}
			else if($request->showByorder=='6'){
				
				$totalItems = count($stars);
				$min = 5;
				$unset_star_index = 0;
				for($i = 0; $i < $totalItems; $i++){
					
					foreach($unset_stars_array as $keyIndex => $star){
						if($min >= $star['average']){
							$min = $star['average'];
							$unset_star_index = $keyIndex;
						}
					}
					unset($unset_stars_array[$unset_star_index]);
					array_push($array_for_index, $unset_star_index);
					$min = 5;
				}
			}


		$text='';

		if($request->showByorder=='5' || $request->showByorder=='6'){
			foreach($array_for_index as $postKey => $array_rating)
			{
				
				$url=URL::to('script',$posts[$array_rating]->id); 
				$text.='<div class="questions-snippet">
				<div class="media media-card media--card align-items-center">
				<div class="votes">
				<div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
				<span class="vote-counts">'.$stars[$array_rating]["average"].'</span>
				<span class="la la-star" style="color:orange"></span>
				</div>
				<div class="answer-block d-flex align-items-center justify-content-between" title="Comments">
				<span class="vote-counts">0</span>
				<span class="la la-comments"></span>
				</div>
				</div>
				<div class="media-body">
				<h5><a href='.$url.'>'.substr($posts[$array_rating]->title,0,60).'</a></h5>
				<p class="fs-10 pt-3">'.$posts[$array_rating]->description.'</p>
				'.$posts[$array_rating]->script.'
				<small class="meta">
				<span class="pr-1">'.$posts[$array_rating]->created_at.'</span>
				<a href="#" class="author">'.$posts[$array_rating]->name.'</a>
				</small>
				</div>
				</div>
				</div>';
			}
		}
		else
		{
			foreach($posts as $postKey => $post)
			{
				$url=URL::to('script',$post->id); 
				$text.='<div class="questions-snippet">
				<div class="media media-card media--card align-items-center">
				<div class="votes">
				<div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
				<span class="vote-counts">'.$stars[$postKey]["average"].'</span>
				<span class="la la-star" style="color:orange"></span>
				</div>
				<div class="answer-block d-flex align-items-center justify-content-between" title="Comments">
				<span class="vote-counts">0</span>
				<span class="la la-comments"></span>
				</div>
				</div>
				<div class="media-body">
				<h5><a href='.$url.'>'.substr($post->title,0,60).'</a></h5>
				<p class="fs-10 pt-3">'.$post->description.'</p>
				'.$post->script.'
				<small class="meta">
				<span class="pr-1">'.$post->created_at.'</span>
				<a href="#" class="author">'.$post->name.'</a>
				</small>
				</div>
				</div>
				</div>';
			}
		}

		echo $text;
	}
	public function scriptDetail($q_id)
	{
		DB::enableQueryLog();
		$data = DB::table('posts')
		->join('users', 'posts.user_id', '=', 'users.id')
		->where('posts.id',$q_id)
		->select('posts.*', 'users.name', 'users.email')

		->orderBy('created_at','DESC')
		->get();
	
		$comment = Comment::where('question_id',$q_id)->with('user')
			->orderBy('id', "DESC")
			->get();
		$rating = Rating::where('script_id',$q_id)->where('rating_user_id',session('user_id'))->pluck('rating')->first();
		$favorites = Favorite::where('script_id',$q_id)->where('user_id',session('user_id'))->first();

		if (empty($rating)) {
  			$rating=0;	
		}
		return view('frontend/question_detail_page')->with('posts',$data)->with('comments',$comment)->with('rating',$rating)->with('favorites',$favorites);
	}

	public function edit($id)
    {
        $post = Post::find($id);

        return view('frontend.edit_script',["post" => $post]);
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->script = $request->script;
        $post->update();

        Session::flash("message","Script Updated Successfully");
        return redirect('addscript');
    }

	public function destroy($id)
    {
        $findPost = Post::find($id)->delete();

        Session::flash("message","Script Deleted Successfully");
        return redirect()->back();
    }

}
