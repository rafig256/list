<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ListingStoreRequest;
use App\Http\Requests\Admin\ListingUpdateRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Location;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListingController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::all();
        return view('admin.listing.index',['listings' => $listings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $categories = Category::query()->where(['status'=>1,'parent_id'=>NULL])->get();
        $locations = Location::all();
        $amenity = Amenity::all();
        return view('admin.listing.create',[
            'categories'=>$categories,
            'locations'=>$locations,
            'amenities'=>$amenity
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingStoreRequest $request)
    {
        $image_path = $this->uploadImage($request,'image');
        $thumbnail_image_path = $this->uploadImage($request,'thumbnail_image');
        $listing = Listing::query()->create([
            'user_id' => \Auth::user()->id,
            'package_id'=> 0,
            'title' => $request->title,
            'image' => $image_path,
            'thumbnail_image' => $thumbnail_image_path,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'slug' => \Str::slug($request->slug),
            'description' => $request->description,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'website'=>$request->website,
            'facebook_link'=>$request->facebook_link,
            'x_link'=>$request->x_link,
            'instagram_link'=>$request->instagram_link,
            'whatsapp_link'=>$request->whatsapp_link,
            'linkedin_link'=>$request->linkedin_link,
            'is_verified'=>$request->is_verified,
            'is_featured'=>$request->is_featured,
            'is_approved'=>1,
            'map_embed_code'=>$request->map_embed_code,
            'seo_title'=>$request->seo_title,
            'seo_description'=>$request->seo_description,
            'expire_date' => date('Y-m-d'),
            'status'=>$request->status,
        ]);
        $listing->amenities()->attach($request->amenity_id);

        toastr()->success('Listing Created Successfully!');

        return to_route('admin.listing.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
//        dd($listing->amenities());
        $categories = \App\Models\Category::all();
        $locations = Location::all();
        $amenity = Amenity::all();
        return view('admin.listing.edit',[
            'listing'=>$listing,
            'categories' => $categories,
            'locations' => $locations,
            'amenities' => $amenity
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListingUpdateRequest $request, Listing $listing)
    {
        $image_path = $this->uploadImage($request,'image',$listing->image);
        $thumbnail_image_path = $this->uploadImage($request,'thumbnail_image',$listing->thumbnail_image);
        $listing->update([
            'package_id'=> 0,
            'title' => $request->title,
            'image' => !empty($image_path) ? $image_path : $listing->image,
            'thumbnail_image' => !empty($thumbnail_image_path) ? $thumbnail_image_path : $listing->thumbnail_image,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'slug' => \Str::slug($request->slug),
            'description' => $request->description,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'website'=>$request->website,
            'facebook_link'=>$request->facebook_link,
            'x_link'=>$request->x_link,
            'instagram_link'=>$request->instagram_link,
            'whatsapp_link'=>$request->whatsapp_link,
            'linkedin_link'=>$request->linkedin_link,
            'is_verified'=>$request->is_verified,
            'is_featured'=>$request->is_featured,
            'map_embed_code'=>$request->map_embed_code,
            'seo_title'=>$request->seo_title,
            'seo_description'=>$request->seo_description,
            'expire_date' => date('Y-m-d'),
            'status'=>$request->status,
        ]);
        $listing->amenities()->sync($request->amenity_id);

        toastr()->success('Listing Update Successfully!');

        return to_route('admin.listing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        toastr()->warning('Listing Delete Successfully!');
        return to_route('admin.listing.index');
    }

    public function getChildCategories(Request $request)
    {
        $parentId = $request->input('parent_id');
        $childCategories = Category::query()->where('parent_id', $parentId)->get();
        return response()->json($childCategories);
    }


}
