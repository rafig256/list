<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityStoreRequest;
use App\Models\Amenity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AmenityController extends Controller
{
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
