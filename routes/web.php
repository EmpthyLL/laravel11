<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about', ['nama' => "Sarah"]);
});

Route::get('/blog', function () {
    return view('blog', ['many' => 5]);
});

Route::get('/contact', function () {
    return view('contact', ['contact' => ['email' => 'sarah.marc@gmail.com', 'phone' => '08766554533']]);
});
