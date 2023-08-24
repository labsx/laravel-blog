<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $posts = Post::latest()->get();

        return view('dashboard.dashboard',[
            'posts' => $posts
        ]);
    }
    public function view($id)
    {
        $data = Post::findOrFail($id);
        return view('dashboard.edit-posts',['post' => $data]);
    }
    public function edit(Request $request, Post $post)
    {
        $validated = $request->validate([
            "slug" => ['required', 'min:5'],
            "title" => ['required', 'min:5'] ,
            "body" => ['required', 'min:4', 'max: 255'], 
        ]);
       
        $post->update($validated);
        return back()->with('message', 'Update Data successfully!');
    }
    public function delete(Post $post)
    {
        $post->delete();
            return back()->with('message', 'Deleted Successfully');
    }
}
