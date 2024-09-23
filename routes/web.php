<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blogs;
use App\Models\Comments;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ['name' => "Sarah", "job" => "Artist", "title" => "About Us"]);
});

Route::get('/blog', function () {
    $blogs = Blogs::all();
    $comments = Comments::pluck("blog_id")->countBy();
    return view('blogs', ['blogs' => $blogs, "title" => "My Blogs", "comments"=> $comments]);
});

Route::get('/blog/{blog:blog_id}', function (Blogs $blog) {
    if (!$blog) {
        abort(404, 'Blog not found');
    }
    return view('blog', ['blog' => $blog, "title" => $blog['title']]);
});

Route::get('/contact', function () {
    return view('contact', ['contact' => ['email' => 'sarah.marc@gmail.com', 'phone' => '08766554533'], "title" => "Contact Us"]);
});