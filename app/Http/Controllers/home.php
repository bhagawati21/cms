<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class home extends Controller
{
    public function index()
    {
        $latestPosts = DB::table('posts')
       ->join('categories', 'categories.id', '=', 'posts.category_id')
       ->join('users', 'users.id', '=', 'posts.author_id')
       ->select('posts.*', 'users.name as uname', 'categories.name')
       ->orderby('updated_at', 'DESC')
       ->get()->take(10);

       $featuredPosts = DB::table('posts')
       ->join('categories', 'categories.id', '=', 'posts.category_id')
       ->join('users', 'users.id', '=', 'posts.author_id')
       ->select('posts.*', 'users.name as uname', 'categories.name')
       ->where('featured', '=', 1)
       ->get();

       $posts = DB::table('posts')
       ->join('categories', 'categories.id', '=', 'posts.category_id')
       ->join('users', 'users.id', '=', 'posts.author_id')
       ->select('posts.*', 'users.name as uname', 'categories.name')
       ->get();

       return view('home', ['lposts'=>$latestPosts, 'fposts'=>$featuredPosts, 'posts'=>$posts]);
    }

    public function search(Request $request)
    {
        $search = $request['search'];

        $posts = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->join('users', 'users.id', '=', 'posts.author_id')
        ->select('posts.*', 'users.name as uname', 'categories.name')
        ->where('title', 'like', "%$search%")
        ->orwhere('body', 'like', '%$search%')->get();

        $categories = DB::table('categories')->select("*")->where('slug', 'like', "%$search%")->get();

        return view('search', ['posts'=>$posts, 'search'=>$search, 'categories'=>$categories]);
    }

    public function postComment(Request $r)
    {
        if(Auth::check())
        {
           $flag = DB::table('comments')->insert($r->only(['user_id', 'post_id', 'content']));
        }
        else
        {
            $flag = DB::table('comments')->insert($r->only(['email', 'author', 'post_id', 'content']));
        }
        
        return back();
    }

    public function comments()
    {
        return view('comments');
    }
}
