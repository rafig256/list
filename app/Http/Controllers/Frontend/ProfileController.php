<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use App\Traits\FileUploadTrait;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function index() :View
    {
        $user = Auth::user();
        return view('frontend.dashboard.profile.index',['user'=>$user]);
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

    public function updatePassword(Request $request)
    {
        $request->validate(['password'=>'required|min:5|confirmed']);
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr()->warning('Password updated successfully!');
        return redirect()->back();
    }
}
