<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {

	Route::get('login', function () {
    	return view('auth.admin_login');
	});

Route::middleware([App\Http\Middleware\RoleAdmin::class])->group(function(){

	Route::get('dashboard',"Admin\DashboardController@dashboard");

	Route::get('profile',"Admin\ProfileController@edit");
	Route::post('profile',"Admin\ProfileController@update");

	Route::get('all-users',"Admin\UserController@index");
	Route::get('edit-user/{id}',"Admin\UserController@edit");
	Route::post('update-user',"Admin\UserController@update");
	Route::get('delete-user/{id}',"Admin\UserController@destroy");

	Route::get('all-scripts',"Admin\ScriptController@index");
	Route::get('edit-script/{id}',"Admin\ScriptController@edit");
	Route::post('update-script',"Admin\ScriptController@update");
	Route::get('delete-script/{id}',"Admin\ScriptController@destroy");
	Route::get('pending-scripts',"Admin\ScriptController@pendingScript");
	Route::get('approved-scripts',"Admin\ScriptController@approvedScript");
	Route::get('declined-scripts',"Admin\ScriptController@declinedScript");

	Route::get('approve-script-status/{id}',"Admin\ScriptController@approveScriptStatus");
	Route::get('decline-script-status/{id}',"Admin\ScriptController@declineScriptStatus");

	});
});

//   >>>>>>>>>>>>user Route<<<<<<<<<<<<<<<

Route::get('about',[PostController::class,'about']);
Route::get('userlogin',[UsersController::class,'signup']);



Route::get('/',[PostController::class,'index']);

Route::post('orderBy',[PostController::class,'selectBy']);
Route::get('selectorder',[PostController::class,'selectorder']);
Route::get('script/{id}',[PostController::class,'scriptDetail']);

Route::middleware([App\Http\Middleware\RoleUser::class])->group(function(){
	
	Route::get('editprofile',[UsersController::class,'edit_profile']);
	Route::get('logout',[UsersController::class,'logout']);
	Route::post('updateprofile',[UsersController::class,'update_profile']);
	Route::post('updateemail',[UsersController::class,'update_email']);
	Route::post('changepassword',[UsersController::class,'update_password']);

	Route::get('rating/{script_id}/{script_user_id}/{star}',[RatingController::class,'rating']);

	Route::get('addscript',[PostController::class,'userpost']);
	Route::post('addpost',[PostController::class,'add_post']);
	Route::get('delete-script/{id}',[PostController::class,'destroy']);
	Route::get('edit-script/{id}',[PostController::class,'edit']);
	Route::post('update-script',[PostController::class,'update']);

	Route::post('comment',[CommentController::class,'save_comment']);
	Route::post('rating',[RatingController::class,'index']);

	Route::get('script-favorite/{script_id}',[FavoriteController::class,'store']);
	Route::get('script-unfavorite/{script_id}',[FavoriteController::class,'destroy']);
	Route::get('all-favorite-scripts',[FavoriteController::class,'favoriteScripts']);
});
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
