<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageCreateRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageCreateRequest $request)
    {
        $newPackage = Package::query()->create([
            'type' => $request->type,
            'name' => $request->name,
            'price' => $request->price,
            'num_of_days' => $request->num_of_days,
            'num_of_listings' => $request->num_of_listings,
            'num_of_photos' => $request->num_of_photos,
            'num_of_amenities' => $request->num_of_amenities,
            'num_of_featured_listings' => $request->num_of_featured_listings,
            'show_at_home'=>$request->show_at_home,
            'status'=>$request->status,
        ]);

        if ($newPackage){
            toastr()->success('Package Created Successfully');
        }
        else{
            toastr()->warning('There was a problem with the save');
        }
        return to_route('admin.package.index');
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
