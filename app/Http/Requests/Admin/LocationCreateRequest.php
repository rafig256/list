<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('locations')->ignore($this->location),
            ],
            'parent_id' => 'nullable|exists:locations,id',
            'slug' => 'required|min:3',
            'show_at_home' => 'boolean',
            'status' => 'boolean',
        ];
    }
}
