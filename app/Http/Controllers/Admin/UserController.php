<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware(['permission:user index'])->only(['index']);
        $this->middleware(['permission:user create'])->only(['create','store']);
        $this->middleware(['permission:user update'])->only(['edit','update']);
        $this->middleware(['permission:user delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $avatar = $this->uploadImage($request , 'avatar');
        $banner = $this->uploadImage($request , 'banner');
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->address = $request->address;
        $user->rate = $request->rate;
        $user->in_link = $request->in_link;
        $user->x_link = $request->x_link;
        $user->fb_link = $request->fb_link;
        $user->instagram_link = $request->instagram_link;
        $user->wa_link = $request->wa_link;
        $user->website = $request->website;
        $user->about = $request->about;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->avatar = $avatar;
        $user->banner = $banner;
        $user->save();

        if ($request->role !== 'none' && $request->user_type == 'admin'){
            $user->assignRole($request->role);
        }

        toastr()->success('user created successfully!');

        return to_route('admin.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit' , compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
//        dd($request->all());
        $avatar = $this->uploadImage($request , 'avatar');
        $banner = $this->uploadImage($request , 'banner');
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->address = $request->address;
        $user->rate = $request->rate;
        $request->filled('in_link') ?? $user->in_link = $request->in_link;
        $request->filled('x_link') ?? $user->x_link = $request->x_link;
        $request->filled('fb_link') ?? $user->fb_link = $request->fb_link;
        $request->filled('instagram_link') ?? $user->instagram_link = $request->instagram_link;
        $request->filled('wa_link') ?? $user->wa_link = $request->wa_link;
        $user->website = $request->website;
        $user->about = $request->about;
        if ($request->filled('password')){$user->password = bcrypt($request->password);}
        if ($request->has('avatar')){$user->avatar = $avatar;}
        if ($request->has('banner')){$user->banner = $banner;}
        $user->save();

        if ($request->role !== 'none' && $request->user_type == 'admin'){
            $user->syncRoles($request->role);
        }

        toastr()->success('user updated successfully!');

        return to_route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        toastr()->success('user deleted successfully!');

        return to_route('admin.user.index');
    }
}
