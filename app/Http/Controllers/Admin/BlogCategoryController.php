<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:blog category index'])->only(['index']);
        $this->middleware(['permission:blog category create'])->only(['create','store']);
        $this->middleware(['permission:blog category update'])->only(['edit','update']);
        $this->middleware(['permission:blog category delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog_categories = BlogCategory::all();
        return view('admin.blog-category.index' , compact('blog_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required|boolean'
        ]);

        BlogCategory::query()->create([
            'name' => $request->name,
            'slug' => \Str::slug($request->slug,'-'),
            'status' => $request->status
            ]);

        toastr()->success('blog category successfully created!');

        return to_route('admin.blog-category.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-category.edit' , compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $blogCategory->update([
            'name' => $request->name ,
            'slug' => \Str::slug($request->slug,'-'),
            'status' => $request->status,
        ]);

        toastr()->success('blog category updated successfully!');

        return to_route('admin.blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        toastr()->warning('blog category deleted successfully!');

        return to_route('admin.blog-category.index');
    }
}
