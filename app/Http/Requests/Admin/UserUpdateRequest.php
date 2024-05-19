<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255' , 'unique:users,name,'.$this->user->id],
            'phone' => ['required'],
            'rate' => ['required','integer'],
            'user_type' => 'in:admin,user',
            'address' => 'required|min:5',
            'role' => 'required',
            'password' => 'nullable|min:4'
        ];
    }
}
