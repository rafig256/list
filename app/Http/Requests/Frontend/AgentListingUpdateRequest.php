<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class AgentListingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->listing->user_id == auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "image" => "nullable|image|max:2000",
            "thumbnail_image" => 'nullable|image|max:1000',
            "title" => "required|string|max:255|unique:listings,title,".$this->listing->id,
            "slug" => "required|string|max:255",
            "category_id" => "required|integer|exists:categories,id",
            "location_id" => "required|integer|exists:locations,id",
            "address" => "required|string|max:255",
            'phone' => 'required|string|min:6|max:14',
            "email" => "required|email",
            "map_embed_code" => 'nullable|string|max:255',
            "website" => "nullable|url",
            "amenity_id.*" => "integer",
            "status" => "required|boolean",
            "is_featured" => "required|boolean",
            "is_verified" => "required|boolean",
            "linkedin_link" => 'nullable',
            "facebook_link" => 'nullable',
            "x_link" => 'nullable',
            "instagram_link" => 'nullable',
            "whatsapp_link" => 'nullable',
            "description" => 'required',
            "seo_title" => "nullable|string|max:255",
            "seo_description" => "nullable|string|max:255",
        ];
    }
}
