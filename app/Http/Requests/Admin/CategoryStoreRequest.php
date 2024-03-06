<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = request()->isMethod('post') ? 'required' : 'sometimes';

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name,'.$this->category->id,
            ],
            'slug'=> 'required|string|max:255',
            'image_icon' => $rule . '|image|max:1000',
            'background_image' => $rule . '|image|max:3000',
            'status' => 'required|boolean',
            'show_at_home' => 'boolean',
        ];
    }



}
