<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts',[
            'posts' => $posts
        ]);  
    }

    public function show(string $id)
    {
        $post = Post::where('slug', $id)->firstOrFail();
    
            return view('slug', [
                'post' => $post
            ]);
    }
    
}