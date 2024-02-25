<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\View\View;


class ProfileController extends Controller
{
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
        dd($request->all());
    }
}
