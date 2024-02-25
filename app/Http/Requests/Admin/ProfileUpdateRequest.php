<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name'=> 'required| max: 255',
            'email'=> 'required|email| max: 255',
            'address'=>'nullable',
            'phone'=>'nullable|regex:/^0\d{9,13}$/',
            'avatar'=>'nullable|image|max:1024',
            'banner'=>'nullable|image|max:2048',
            'about'=>'nullable|string|max:1000',
            'fa_link'=>'nullable|string|max:255',
            'x_link'=>'nullable|string|max:255',
            'instagram_link'=>'nullable|string|max:255',
            'in_link'=>'nullable|string|max:255',
            'wa_link'=>'nullable|string|max:255',
            'user_type'=>'required|in:user,admin',
        ];
    }
}
