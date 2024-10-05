<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\User;

Route::get('/login', function () {
    return view('login', ["title" => "Login Page"]);
});

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ['name' => "Sarah", "job" => "Artist", "title" => "About Us"]);
});

Route::get('/blog', function () {
    // $blogs = Blogs::with("comments")->latest();
    // if(request('key')){
    //     $blogs->where('title','like','%'.request('key').'%');
    // }
    $categories = Categories::all();
    return view('blogs', ['blogs' => Blogs::with('comments')->filter(request(['key', 'category']))->latest()->paginate(6)->withQueryString(), 'key' => request('key'), "categories" => $categories, "title" => "My Blogs"]);
});
// Route::get('/blog/category/{category:slug}', function (Categories $category) {
//     $categories = Categories::all();
//     return view('blogs', ['blogs' => $category->blogs->load('comments'), "categories"=>$categories, "title" => "My Blogs"]);
// });

Route::get('/blog/{blog:blog_id}', function (Blogs $blog) {
    if (!$blog) {
        abort(404);
    }
    $comments = $blog->comments->load('users');
    return view('blog', ['blog' => $blog, 'comments' => $comments, "title" => $blog['title']]);
});

Route::get('/profile/{user:username}', function (User $user) {    
    if (!$user) {
        abort(404);
    }
    return view('profile', ["title" => $user->username, "comments" => $user->comments->load(['users', 'blogs'])]);
});

Route::get('/contact', function () {
    return view('contact', ['contact' => ['email' => 'sarah.marc@gmail.com', 'phone' => '08766554533'], "title" => "Contact Us"]);
});