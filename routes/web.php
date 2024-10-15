<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\User;

Route::get('/login', [LoginController::class, 'index'])->middleware("guest")->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->middleware("guest");;


Route::get('/', function () {
    return view('home', ["title" => auth()->check() ? "Welcome Back, ".auth()->user()->fullname : "Welcome, User!"]);
});

Route::get('/portfolio', function () {
    return view('portfolio', ["title" => "Portfolio"]);
});

Route::get('/about', function () {
    return view('about', ['name' => "Sarah", "job" => "Artist", "title" => "About Me"]);
});

Route::get('/blog', function () {
    // $blogs = Blogs::with("comments")->latest();
    // if(request('key')){
    //     $blogs->where('title','like','%'.request('key').'%');
    // }
    $categories = Categories::all();
    return view('blogs', ['blogs' => Blogs::with('comments')->filter(request(['key', 'category']))->latest()->paginate(6)->withQueryString(), 'key' => request('key'), "categories" => $categories, "title" => "Your Stories"]);
});
// Route::get('/blog/category/{category:slug}', function (Categories $category) {
//     $categories = Categories::all();
//     return view('blogs', ['blogs' => $category->blogs->load('comments'), "categories"=>$categories, "title" => "My Blogs"]);
// });

Route::get('/blog/{blog:blog_id}', function (Blogs $blog) {
    if (!$blog) {
        abort(404);
    }
    $categories = Categories::all();
    $comments = $blog->comments->load('users');
    return view('blog', ['blog' => $blog, 'comments' => $comments, "categories" => $categories, "title" => $blog['title']]);
});

Route::post('/blog', [BlogsController::class, 'store'])->middleware('auth');

Route::delete('/blog/{blog:blog_id}', [BlogsController::class, 'destroy'])->middleware('auth');

Route::put('/blog/{blog:blog_id}', [BlogsController::class, 'update'])->middleware('auth');

Route::get('/profile', function () {
    return view('profile', ["title" => auth()->user()->username, "user" => auth()->user()->load(['comments'])]);
})->middleware('auth');

Route::get('/profile/{user:username}', function (User $user) {
    if (!$user) {
        abort(404);
    }
    return view('profile', ["title" => $user->username, "user" => $user->load(['comments'])]);
});

Route::get('/contact', function () {
    return view('contact', ['contact' => ['email' => 'sarah.marc@gmail.com', 'phone' => '08766554533'], "title" => "Contact Us"]);
});