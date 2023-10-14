<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileFormRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->id())],
            'phone' => ['nullable', 'numeric'],
            'zip_code' => ['nullable', 'numeric', 'digits:5'],
            'password' => ['nullable' , 'required_with:new_password' ,'current_password:user'],
            'new_password' => ['nullable', 'min:8'],
            'password_confirmation' => ['same:new_password']
        ];
    }


    public function messages(){
        return [
            'password_confirmation.same' => 'Passwords didn\'t match',
            'password.required_with' => 'old password is required'
        ];
    }
}
