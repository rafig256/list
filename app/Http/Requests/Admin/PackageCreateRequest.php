<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', 'in:free,paid'],
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric'],
            'num_of_days' => ['required', 'integer'],
            'num_of_listings' => ['required', 'integer'],
            'num_of_photos' => ['required', 'integer'],
            'num_of_amenities' => ['required', 'integer'],
            'num_of_featured_listings' => ['required', 'integer'],
            'show_at_home'=>['required','boolean'],
            'status'=>['required','boolean'],
        ];
    }
}
