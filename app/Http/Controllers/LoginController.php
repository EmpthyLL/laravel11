<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view("login", ['title' => 'login Page']);
    }
    public function authenticate(Request $request){
        $credential = $request->validate([
            'identity' => 'required',
            'password' => 'required',
        ]);

        $identityField = filter_var($credential['identity'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::attempt([$identityField => $credential['identity'], 'password' => $credential['password']])) {
            $request->session()->regenerate();
            return redirect()->intended(url('/'));
        }
        return back()->with('invalidCred', true)->withInput();;
    }
}