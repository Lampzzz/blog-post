<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function show()
    {

        return view('profile.index');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);


        if (!Auth::attempt($attributes)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'auth' => 'The provided credentials do not match our records.'
                ]);
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
