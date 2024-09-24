<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blogs;
use App\Models\User;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ['name' => "Sarah", "job" => "Artist", "title" => "About Us"]);
});

Route::get('/blog', function () {
    $blogs = Blogs::all();
    return view('blogs', ['blogs' => $blogs, "title" => "My Blogs"]);
});

Route::get('/blog/{blog:blog_id}', function (Blogs $blog) {
    if (!$blog) {
        abort(404, 'Blog not found');
    }
    $comments = $blog->comments;
    return view('blog', ['blog' => $blog, 'comments' => $comments, "title" => $blog['title']]);
});

Route::get('/profile/{user:username}', function (User $user) {
    return view('profile', ["title" => $user->username, "user"=>$user]);
});

Route::get('/contact', function () {
    return view('contact', ['contact' => ['email' => 'sarah.marc@gmail.com', 'phone' => '08766554533'], "title" => "Contact Us"]);
});