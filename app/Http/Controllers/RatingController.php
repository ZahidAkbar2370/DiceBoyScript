<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
 	public function index(Request $request)
 	{
 		$data= $request->input();
 		$rating_user_id= Session('user_id');
 		$rating=New Rating();
 		$id = rating::where('rating_user_id',$rating_user_id)->where('script_id',$request->script_id)->pluck('id')->first();
 		print_r($id);
 		if($id)
 		{
 			$updateRating = Rating::find($id);
			$updateRating->update(array('rating' => $data['rating']));
 		}
 		else
 		{
 			$rating->script_id = $data['script_id'];
 			$rating->script_user_id = $data['script_user_id'];
 			$rating->rating_user_id = $rating_user_id;
 			$rating->rating = $data['rating'];
 			$rating->save();
 		}
 	}

 		public function rating($script_id, $script_user_id, $star)
 		{
 			$rating_user_id= Session('user_id');

 			$insertRating = Rating::create([
 				"script_id" => $script_id,
 				"script_user_id" => $script_user_id,
 				"rating_user_id" => $rating_user_id,
 				"rating" => $star,
 			]);
 
 			session()->flash('success','Your Rating Added Successfuly');
 			return redirect()->back();
 		}

 	
}
