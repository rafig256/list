<?php

namespace App\Traits;
use File;
use Illuminate\Http\Request;

trait FileUploadTrait
{
    public function uploadImage(Request $request ,string $inputName ,?string $oldPath = Null ,string $prePath = '/uploads'): ?string
    {
        if ($request->hasFile($inputName)){
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imagName = 'media'.uniqid().'.'.$ext ;
            $image->move(public_path($prePath),$imagName);
            $exceptPath = '/default';
            if ($oldPath && File::exists(public_path($oldPath)) && strpos($oldPath, $exceptPath) !== 0 ){
                File::delete(public_path($oldPath));
            }
            return $prePath.'/'.$imagName ;
        }
        return null;
    }
}
