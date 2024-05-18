<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityStoreRequest;
use App\Http\Requests\Admin\AmenityUpdateRequest;
use App\Models\Amenity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AmenityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:amenity index'])->only(['index']);
        $this->middleware(['permission:amenity create'])->only(['create','store']);
        $this->middleware(['permission:amenity update'])->only(['edit','update']);
        $this->middleware(['permission:amenity delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $amenities = Amenity::all();
        return view('admin.amenity.index',['amenities'=>$amenities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('admin.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmenityStoreRequest $request):RedirectResponse
    {
        $amenity = Amenity::query()->create([
            'name' => $request->name,
            'slug' => \Str::slug($request->slug),
            'icon' => $request->icon,
            'status' => $request->status,
        ]);
        toastr()->success('Amenity created successfully.');
        return to_route('admin.amenity.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amenity $amenity)
    {
        return view('admin.amenity.edit',['amenity'=>$amenity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmenityUpdateRequest $request, Amenity $amenity)
    {
        $amenity->update([
            'name' => $request->name,
            'slug'=> \Str::slug($request->slug),
            'icon' => $request->filled('icon') ? $request->icon : $amenity->icon,
            'status' => $request->status,
        ]);
        toastr()->success('Amenity updated successfully.');
        return to_route('admin.amenity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        toastr()->warning('Amenity deleted successfully.');
        return to_route('admin.amenity.index');
    }
}
