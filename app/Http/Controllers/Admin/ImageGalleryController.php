<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\Listing;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageGalleryController extends Controller
{
    use FileUploadTrait;
    public function create(Listing $listing) :View
    {
        $images = $listing->ImagesGallery;
        return view('admin.listing.image.create', compact(['listing','images']));
    }

    public function store(Request $request){
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

    public function destroy(ImageGallery $imageGallery)
    {
        $this->deleteFile($imageGallery->image);
        $imageGallery->delete();
        toastr()->warning('Image successfully deleted!');

        return redirect()->back();
    }
}
