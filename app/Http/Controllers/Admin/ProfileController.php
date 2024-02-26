<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Traits\FileUploadTrait;


class ProfileController extends Controller
{
    use  FileUploadTrait;
    public function show():View
    {
        return view('admin.profile.show');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $avatarCheck = false;
        $bannerCheck = false;
        if ($request->avatar){
            $avatarCheck = true;
            $avatar = $this->uploadImage($request , 'avatar' , $user->avatar);
        }
        if ($request->banner){
            $bannerCheck = true;
            $banner = $this->uploadImage($request , 'banner' , $user->banner);
        }
        $user->update([
            'name'=>$request->name,
            'address' => $request->address,
            'website' => $request->website,
            'phone' => $request->phone,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'about' => $request->about,
            'avatar' => $avatarCheck ? $avatar : $user->avatar,
            'banner' => $bannerCheck ? $banner : $user->banner,
            'fb_link' => $request->fb_link,
            'x_link' => $request->x_link,
            'instagram_link' => $request->instagram_link,
            'in_link' => $request->in_link,
            'wa_link' => $request->wa_link,
        ]);
        toastr()->success('Profile updated successfully!');
        return redirect()->back();
    }
}
