<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Draft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (array_key_exists('post', $data)) {
            if($request->file('thumbnail')){
                $data['thumbnail'] = $request->file('thumbnail')->store('blog-thumbnails');
            }
            Blogs::create($data);
            return redirect('/blog')->with("post", true);
        } else if (array_key_exists('save', $data)) {
            if ($data['title'] !== null || $data['body'] !== null || isset($data['category_id']) || isset($data['thumbnail'])) {
                Draft::create($data);
                return redirect('/blog')->with("save", true);
            }
        }
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogs $blog)
    {
        $data = $request->all();
        if($data['category_id'] == $blog->category_id && $data['title'] === $blog->title && $data['body'] === $blog->body && !isset($data['thumbnail'])){
            return redirect('/blog');
        }
        if($data['oldThumb']){
            Storage::delete($data['oldThumb']);
        }
        $data['thumbnail'] = $request->file('thumbnail')->store('blog-thumbnails');
        $blogData = ['category_id'=>$data['category_id'], "title"=>$data['title'], 'body'=>$data['body'], "thumbnail"=>$data['thumbnail']];
        Blogs::where("blog_id", $blog->blog_id)->update($blogData );
        return redirect('/blog')->with("edit", true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blog)
    {
        if($blog->thumbnail){
            Storage::delete($blog->thumbnail);
        }
        Blogs::destroy($blog->blog_id);
        return redirect('/blog')->with("delete", true);
    }
}