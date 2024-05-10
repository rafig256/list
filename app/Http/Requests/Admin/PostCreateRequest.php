<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'nullable|file',
            'is_popular' => 'required|boolean',
            'description' => 'required | min:100',
            'status' => 'required|boolean',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'listing_id' => 'nullable|exists:listings,id',
            'blog_category' => 'required|array|min:1',
            'blog_category.*' => 'exists:blog_categories,id',
        ];
    }
}
