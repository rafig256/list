<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware(['permission:testimonial index'])->only(['index']);
        $this->middleware(['permission:testimonial create'])->only(['create','store']);
        $this->middleware(['permission:testimonial update'])->only(['edit','update']);
        $this->middleware(['permission:testimonial delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|max:1024',
            'role' => 'required',
            'rating' => 'required|integer',
            'description' => 'required|min:20',
            'status' => 'required|boolean'
        ]);


        $image_patch = $this->uploadImage($request,'image');

        Testimonial::query()->create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $image_patch ,
            'rating' => $request->rating,
            'description' => $request->description,
            'status' => $request->status
        ]);

        toastr()->success('Testimonial created successfully!');

        return to_route('admin.testimonial.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|max:1024',
            'role' => 'required',
            'rating' => 'required|integer',
            'description' => 'required|min:20',
            'status' => 'required|boolean'
        ]);
        if ($request->hasFile('image')){
            $image_patch = $this->uploadImage($request,'image');
        }else{
            $image_patch = $testimonial->image;
        }

        $testimonial->update([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $image_patch ,
            'rating' => $request->rating,
            'description' => $request->description,
            'status' => $request->status
        ]);

        toastr()->success('Testimonial updated successfully!');

        return to_route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        toastr()->success('Testimonial deleted successfully!');

        return to_route('admin.testimonial.index');
    }
}
