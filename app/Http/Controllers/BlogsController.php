<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Draft;
use Illuminate\Http\Request;

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
    public function update(Request $request, Blogs $blogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blog)
    {
        Blogs::destroy($blog->blog_id);
        return redirect('/blog')->with("delete", true);
    }
}
