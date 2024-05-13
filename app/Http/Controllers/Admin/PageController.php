<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use FileUploadTrait;

    public function about()
    {
        $about = About::query()->first();
        return view('admin.about.index',compact('about'));
    }

    public function update(Request $request){

        $imagePatch = $this->uploadImage($request , 'image' , $request->old_image);
        $bigImagePatch = $this->uploadImage($request , 'image_big' , $request->old_image_big);

        About::query()->updateOrCreate(
            ['id'=> 1],
            [
                'id'=> 1,
                'image'=> !empty($imagePatch) ? $imagePatch : $request->old_image,
                'image_big'=> !empty($bigImagePatch) ? $bigImagePatch : $request->old_image_big,
                'titre'=> $request->title,
                'description'=> $request->description,
            ]
        );
        toastr()->success('About Page Data updated successfully');
        return redirect()->back();
    }
}
