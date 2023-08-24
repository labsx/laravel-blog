<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    public function logout(Request $request)
    {
        auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect ('/')->with('message', 'Log out successful');
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

}
