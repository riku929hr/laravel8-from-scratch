<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            return redirect()->with('success', 'Welcome Back!!');
        }


        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
        // return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }
}
