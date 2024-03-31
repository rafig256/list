<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationCreateRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Null_;

class LocationController extends Controller
{
    public function index():View
    {
        $locations = Location::all();
        return view('admin.location.index',['locations'=>$locations]);
    }

    public function create():View
    {
        $parentLocations = Location::query()->where(['parent_id'=> null , 'status' => 1])->get();
        return view('admin.location.create',compact('parentLocations'));
    }

    public function store(LocationCreateRequest $request){
        Location::query()->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id ? $request->parent_id : NULL ,
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
