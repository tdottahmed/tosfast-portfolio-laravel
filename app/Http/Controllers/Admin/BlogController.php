<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        try {
            $request->handle();
            return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Blog creation failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            $request->handle($blog);
            return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Blog update failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            File::delete(getFilePath($blog->image));
            $blog->delete();
            return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Blog deletion failed.');
        }
    }
}
