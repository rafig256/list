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

    public function uploadImageArray(Request $request ,string $inputName ,string $prePath = '/uploads'): ?array
    {
        if ($request->hasFile($inputName)){
            $path = array();
            foreach ($request->{$inputName} as $image){
                $ext = $image->getClientOriginalExtension();
                $imagName = 'media'.uniqid().'.'.$ext ;
                $image->move(public_path($prePath),$imagName);
                $path[] = $prePath.'/'.$imagName ;
            }
            return $path;
        }
        return null;
    }

    public function deleteFile($path): void{
        $exceptPath = '/default';
        if ($path && File::exists(public_path($path)) && strpos($path, $exceptPath) !== 0 ){
            File::delete(public_path($path));
        }
    }
}
