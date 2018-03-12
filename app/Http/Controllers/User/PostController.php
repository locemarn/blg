<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function post(post $post)
    {
        return view('user.post', compact('post'));
    }
}
