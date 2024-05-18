<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review_cat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewCatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:review category index'])->only(['index']);
        $this->middleware(['permission:review category create'])->only(['create','store']);
        $this->middleware(['permission:review category update'])->only(['edit','update']);
        $this->middleware(['permission:review category delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review_cats = Review_cat::all();
        return view('admin.review-cat.index',compact('review_cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.review-cat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:review_cats,name',
        ]);

        Review_cat::query()->create([
            'name' => $request->name,
        ]);

        toastr()->success('Review Category created successfully');
        return to_route('admin.review-cat.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review_cat $review_cat)
    {
        return view('admin.review-cat.edit',compact('review_cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review_cat $review_cat)
    {
        $request->validate([
           'name'=>['required',Rule::unique('review_cats')->ignore($review_cat->id)]
        ]);

        $review_cat->update([
            'name' => $request->name,
        ]);

        toastr()->success('Review Category updated successfully');
        return to_route('admin.review-cat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review_cat $review_cat)
    {
        $review_cat->delete();

        toastr()->warning('Review Category deleted successfully');
    }
}
