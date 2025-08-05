<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validatedFormData = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:8'
        ]);
        // dd($validatedFormData);
        // $validatedFormData['password'] = bcrypt($validatedFormData['password']);
        $new_user = User::create($validatedFormData);
        //login
        auth()->login($new_user);
        return redirect('/')->with('success', 'Welcome, Dear '. $new_user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin()
    {
        $validatedLoginData = request()->validate([
            'email' => ['required', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required', 'min:8', 'max:255'],
        ], [
            'email.required' => 'Email address is required!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 8 characters!'
        ]);
        // dd($validatedLoginData);
        // if user credenditlas is correct -> redirect home
        if(auth()->attempt($validatedLoginData)) {
            if(auth()->user()->is_admin) {
                return redirect('admin/blogs')->with('success', 'Logged in successfully');
            } else {
                return redirect('/')->with('success', 'Logged in successfully');
            }
        } else {
            // if user credentials is wrong -> redirect back with error
            return redirect()->back()->withErrors([
                'email' => 'Wrong credentials!'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
