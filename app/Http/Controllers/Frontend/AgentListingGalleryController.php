<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\Listing;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AgentListingGalleryController extends Controller
{
    use FileUploadTrait;

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $listing_id = $request->listing_id;
        $listing = Listing::query()->where('id',$listing_id)->first();
        $images = $listing->ImagesGallery;
        return view('frontend.dashboard.listing.gallery.create',compact('listing','images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'listing_id' => 'required|exists:listings,id',
            'images' => 'required',
            'images.*'=> 'required|image|max:3000'
        ], [
            'image.required'=> 'Please upload at least one image',
            'images.*' => 'Please select image type',
            'images.*.mimes' => 'The :attribute must be a file of type: jpeg, png, jpg, gif, svg.'
        ]);
        $path = $this->uploadImageArray($request , 'images');
        if (!empty($path)){
            foreach ($path as $image){
                ImageGallery::create([
                    'listing_id' => $request->listing_id,
                    'image' => $image
                ]);
            }
        }else{
            toastr()->warning('The uploaded Images are not valid');
            return redirect()->back();
        }
        toastr()->success('Images successfully uploaded!');
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageGallery $gallery)
    {
        $this->deleteFile($gallery->image);
        $gallery->delete();

        toastr()->warning('Image successfully deleted!');
        return redirect()->back();
    }
}
