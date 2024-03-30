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
        $unique = request()->isMethod('post') ? 'unique:categories,name'  : 'unique:categories,name,' . $this->category->id;

        return [
            'parent_id' => ['nullable','exists:categories,id'] ,
            'name' => [
                'required',
                'string',
                'max:255',
//                'unique:categories,name,'.$this->category->id,
                $unique,
            ],
            'slug'=> 'required|string|max:255',
            'price' => ['required','integer'],
            'image_icon' => $rule . '|image|max:1000',
            'background_image' => $rule . '|image|max:3000',
            'status' => 'required|boolean',
            'show_at_home' => 'boolean',
        ];
    }



}
