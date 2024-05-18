<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Models\Category;
use App\Models\Review_cat;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class CategoryController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware(['permission:listing category index'])->only(['index']);
        $this->middleware(['permission:listing category create'])->only(['create','store']);
        $this->middleware(['permission:listing category update'])->only(['edit','update']);
        $this->middleware(['permission:listing category delete'])->only(['destroy']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::query()->where('status',1)->get();
        return view('admin.category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $review_cats = Review_cat::all();
        $categories = Category::query()->where('status',1)->where('parent_id',Null)->select('id','name')->get();
        return view('admin.category.create',compact('categories','review_cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $image_icon = $this->uploadImage($request,'image_icon');
        $background_image = $this->uploadImage($request,'background_image');
        $category = Category::query()->create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->slug),
            'parent_id' => $request->parent_id,
            'image_icon'=> $image_icon,
            'background_image'=> $background_image,
            'show_at_home'=> $request->show_at_home ? $request->show_at_home : 0,
            'status'=> $request->status,
            'price'=> $request->price,
        ]);
        $category->review_cats()->attach($request->review_cats_id);
        toastr()->success('Category Created Successfully');
        return to_route('admin.category.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $review_cats = Review_cat::all();
        $categories = Category::query()->where('status',1)->where('parent_id',Null)->select('id','name')->get();
        return view('admin.category.edit',compact('category','categories','review_cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreRequest $request, Category $category)
    {
        if ($request->image_icon){
            $image_icon = $this->uploadImage($request,'image_icon',$request->image_icon);
        }else{
            $image_icon = $category->image_icon;
        }
        if ($request->background_image){
            $background_image = $this->uploadImage($request,'background_image',$request->background_image);
        }
        else{
            $background_image = $category->background_image;
        }

        $category->update([
            'name'=> $request->name,
            'price'=>$request->price,
            'parent_id'=> $request->parent_id,
            'slug'=> Str::slug($request->slug),
            'image_icon'=> $image_icon,
            'background_image'=> $background_image,
            'show_at_home'=> $request->show_at_home ? $request->show_at_home : 0,
            'status'=> $request->status,
        ]);

        $category->review_cats()->sync($request->review_cats_id);
        toastr()->success('Category Update Successfully');
        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->deleteFile($category->image_icon);
        $this->deleteFile($category->background_image);
        $category->delete();
        toastr()->info('Category Delete Successfully');
        return to_route('admin.category.index');
    }
}
