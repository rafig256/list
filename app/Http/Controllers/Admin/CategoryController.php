<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class CategoryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $image_icon = $this->uploadImage($request,'image_icon');
        $background_image = $this->uploadImage($request,'background_image');
        Category::query()->create([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'image_icon'=> $image_icon,
            'background_image'=> $background_image,
            'show_at_home'=> Str::slug($request->show_at_home),
            'status'=> $request->status,
        ]);
        toastr()->success('Category Created Successfully');
        return to_route('admin.category.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
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
            'slug'=> Str::slug($request->slug),
            'image_icon'=> $image_icon,
            'background_image'=> $background_image,
            'show_at_home'=> $request->show_at_home ? $request->show_at_home : 0,
            'status'=> $request->status,
        ]);
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
