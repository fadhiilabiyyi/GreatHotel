<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {
        $rules = [
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:8', 'max:32', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
        ];

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'hotel_guest';

        User::create($validatedData);

        return redirect('/login')->with('success', 'New Guest has been added!');
    }
}
