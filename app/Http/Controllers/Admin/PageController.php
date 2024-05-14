<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
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

    public function about_update(Request $request){
        $request->validate([
            'titre' => 'required|string',
            'description' => "required|min:100"
        ]);
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

    public function contact(){
        $contact = Contact::query()->first();
        return view('admin.contact.index',compact('contact'));
    }

    public function contact_update(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'map_url' => 'required'
        ]);

        Contact::query()->updateOrCreate(
            ['id' => 1],
            [
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'map_url' => $request->map_url,
                ]
        );

        toastr()->success('Contact Page Data updated successfully');
        return redirect()->back();
    }
}
