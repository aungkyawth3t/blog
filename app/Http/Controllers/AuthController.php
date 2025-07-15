<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
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
        // session()->flash('success', 'Welcome, Dear '. $new_user->name);
        return redirect('/')->with('success', 'Welcome, Dear '. $new_user->name);
    }
}
