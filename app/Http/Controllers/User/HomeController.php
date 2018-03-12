<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = post::where('status', 1)->paginate(5);
        return view('user.blog', compact('posts'));
    }
}
