<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view("register", ['title' => 'Register Page']);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|min:4|max:255',
            'email' => 'required|unique:users|email:dns',
            'fullname' => 'max:255',
            'password' => 'required|min:6|max:255',
            'confirm' => 'required|same:password',
        ]);
        if ($validated['fullname'] === null) {
            $validated['fullname'] = '-';
        }
        User::create($validated);
        // $request->session()->flash('registered', true);
        return redirect('/login')->with('registered', true);
    }
}
