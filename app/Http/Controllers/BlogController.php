<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('category')->get();

        return view('blog.index', ['blogs' => $blogs]);
    }

    public function displayPublishedPostList(Request $request)
    {
        $blogs = Blog::published();

        if ($category_id = $request->get('category_id')) {
            $blogs->where('category_id', $category_id);
        }


        return view('welcome', ['blogs' => $blogs->paginate(6), 'categories' => Category::all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $blog = new Blog();

        $blog->fill($request->validated());

        $blog->user()->associate(Auth::user());

        $blog->save();

        return Redirect::route('blog.index')->with('status', 'Blog Post created!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', ['blog' => $blog, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, Blog $blog)
    {
        $blog->fill($request->validated());

        $blog->user()->associate(Auth::user());

        $blog->save();

        return Redirect::route('blog.index')->with('status', 'Blog Post updated!');
    }


    public function publish(Blog $blog)
    {
        $blog->publish();

        return Redirect::route('blog.index')->with('status', 'Blog Post published!');
    }

    public function unpublish(Blog $blog)
    {
        $blog->unpublish();

        return Redirect::route('blog.index')->with('status', 'Blog Post unpublished!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return Redirect::route('blog.index')->with('status', 'Blog Post Deleted!');
    }
}
