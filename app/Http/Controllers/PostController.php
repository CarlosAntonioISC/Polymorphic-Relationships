<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {   
        $user = $post->user()->with('image')->first();
        $comments = $post->comments()->with('user', 'user.image')->get();
        
        return view('post.show')
            ->with('post', $post)
            ->with('user', $user)
            ->with('comments', $comments);
    }
}
