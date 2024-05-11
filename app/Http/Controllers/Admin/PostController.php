<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCreateRequest;
use App\Models\BlogCategory;
use App\Models\Listing;
use App\Models\Post;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listing = Listing::query()->where('user_id' , \Auth::user()->id)->get();
        $blogCategories = BlogCategory::query()->where('status' , 1)->get();
        return view('admin.post.create' , compact('blogCategories','listing'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $imagePatch = $this->uploadImage($request,'image');
        $post = Post::query()->create([
            'title' => $request->title,
            'slug' => $request->slug,
            'listing_id' => $request->listing_id ?? NULL,
            'user_id' => \Auth::user()->id,
            'image' => $imagePatch,
            'is_popular' => $request->is_popular,
            'status' => $request->status,
            'description' => $request->description,
            'seo_title'=>$request->seo_title,
            'seo_description'=>$request->seo_description,
            ]);
        $post->blogCategories()->attach($request->blog_category);

        toastr()->success('Post Created Successfully');

        return to_route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $listing = Listing::query()->where('user_id' , \Auth::user()->id)->get();
        $blogCategories = BlogCategory::query()->where('status' , 1)->get();
        return view('admin.post.edit',compact('post','listing' , 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        toastr()->success('the post deleted successfully!');

        return to_route('admin.post.index');
    }
}
