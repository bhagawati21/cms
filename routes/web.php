<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\blog;
use App\Http\Controllers\contact;
use App\Http\Controllers\about;
use App\Models\Post as Posts;
use App\Models\Category;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/',[home::class,'index'])->name('home');
Route::get('/contact',[contact::class,'contact']);
// Route::get('/post',[post::class,'post']);
Route::get('/about',[about::class,'about']);

Route::get('posts/{slug}', function($slug){
	$post = DB::table('posts')
		->join('categories', 'categories.id', '=', 'posts.category_id')
		->join('users', 'users.id', '=', 'posts.author_id')
		->select('posts.*', 'users.name as uname', 'categories.name')
		->where('posts.slug', '=', $slug)
		->first();
	$latestPosts = DB::table('posts')
       ->join('categories', 'categories.id', '=', 'posts.category_id')
       ->join('users', 'users.id', '=', 'posts.author_id')
       ->select('posts.*', 'users.name as uname', 'categories.name')
       ->orderby('updated_at', 'DESC')
       ->get()->take(10);

    $comments = DB::table('comments')
    ->where('comments.post_id', '=', $post->id)->get();

	return view('post', ['post'=>$post, 'latestPosts'=>$latestPosts, 'comments'=>$comments]);
});

Route::post('/comment', [home::class, 'postComment']);

Route::get('/category/{slug}', function($slug){
	$posts = DB::table('posts')
		->join('categories', 'categories.id', '=', 'posts.category_id')
		->join('users', 'users.id', '=', 'posts.author_id')
		->select('posts.*', 'users.name as uname', 'categories.name')
		->where('categories.slug', '=', $slug)
		->get();

	return view('category', ['posts'=>$posts, 'category'=>$slug]);
});

Route::get('/admin/comments', [home::class, 'comments']);

// Search Route
Route::post('/search', [home::class, 'search']);

// Login Routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-register', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});