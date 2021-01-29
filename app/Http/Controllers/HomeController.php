<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $users = User::with('posts')->get();

        return view('welcome', compact('users'));
        //$posts = $user->posts()->with('category','image', 'tags')->get();
    }
        

}
