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

    public function register()
    {
        return view ('admin.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ['required', 'min:5'],
            "email" => ['required','email', Rule::unique('users', 'email')] ,
            "password" => ['required', 'min:4', 'max: 50'], 
        ]);
        $valdiate['password']=bcrypt($validated['password']);
        auth()->login(User::create($validated));  
        return redirect('/')->with('message', 'Added Successfully');
    }

    public function display()
    {
        return view ('admin.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            "email" =>['required','email'] ,
            "password" => ['required'],
        ]);

        if(auth()->attempt($validated))
        {
            $request->session()->regenerate();
            return redirect('/dashboard') ->with('message', 'Welcome Back !');
        }else{
            return back()->with('message', 'username and password not match!');
        }
    }

    public function dashboard()
    {
        $posts = Post::latest()->get();

        return view('dashboard.dashboard',[
            'posts' => $posts
        ]);
    }

    public function delete(Post $post)
    {
        $post->delete();
            return back()->with('message', 'Deleted Successfully');
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

    public function logout(Request $request)
    {
        auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect ('/')->with('message', 'Log out successful');
    }
}