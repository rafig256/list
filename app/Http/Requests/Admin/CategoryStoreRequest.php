<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:Categories,name',
            'slug'=> 'required|string|max:255',
            'image_icon'=>'required|image|max:1000',
            'background_image'=>'required|image|max:3000',
            'status' => 'required|boolean',
            'show_at_home'=>'required|boolean',
        ];
    }
}
