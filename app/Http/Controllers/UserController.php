<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->with('image')->get();

        return view('user.show')
            ->with('posts', $posts)
            ->with('user', $user);
    }
}
