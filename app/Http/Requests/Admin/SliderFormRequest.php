<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderFormRequest extends FormRequest
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
        $id = $this->route('slider') ?? 0;
        
        return [
            'title' => ['required', 'string'],
            'description' => ['required','max:200'],
            'image_file' => [Rule::requiredIf(!$id), 'mimes:jpg,jpeg,png']
        ];
    }
}
