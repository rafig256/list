<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationCreateRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationController extends Controller
{
    public function index():View
    {
        $locations = Location::all();
        return view('admin.location.index',['locations'=>$locations]);
    }

    public function create():View
    {
        return view('admin.location.create');
    }

    public function store(LocationCreateRequest $request){
        Location::query()->create([
            'name' => $request->name,
            'slug'=> \Str::slug($request->slug),
            'show_at_home'=>$request->show_at_home ? $request->show_at_home : 0,
            'status'=> $request->status,
        ]);

        toastr()->success('Location Created Successfully');
        return to_route('admin.location.index');
    }

    public function edit(Location $location)
    {
        return view('admin.location.edit',['location'=>$location]);
    }

    public function update(LocationCreateRequest $request, Location $location){
        $location->update([
            'name' => $request->name,
            'slug'=> \Str::slug($request->slug),
            'show_at_home'=>$request->show_at_home ? $request->show_at_home : 0,
            'status'=> $request->status,
        ]);

        toastr()->success('Location Updated Successfully');
        return to_route('admin.location.index');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        toastr()->warning('Location Deleted Successfully');
        return to_route('admin.location.index');
    }
}
