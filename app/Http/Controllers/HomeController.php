<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\tag;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(post $post)
    {
        $posts = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
        return view('user.blog', compact('posts'));
    }

    public function post()
    {
        return view('user.post');
    }
}
