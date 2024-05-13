<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroUpdateRequest;
use App\Models\Hero;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HeroController extends Controller
{
    use FileUploadTrait;
    public function index(): View{
        $hero = Hero::query()->first();
        return view('admin.hero.index',['hero'=>$hero]);
    }

    public function update(HeroUpdateRequest $request): RedirectResponse
    {

        $filePatch = $this->uploadImage($request , 'background' , $request->old_background);
        Hero::query()->updateOrCreate(
            ['id'=> 1],
            [
                'id'=> 1,
                'background'=> !empty($filePatch) ? $filePatch : $request->old_background,
                'titre'=> $request->title,
                'sub_title'=> $request->sub_title,
            ]
        );
        toastr()->success('hero updated successfully');
        return redirect()->back();
    }
}
