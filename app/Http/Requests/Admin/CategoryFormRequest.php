<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryFormRequest extends FormRequest
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
        $id = $this->route('category') ?? 0;
        return [
            'name' => ['required', 'string', Rule::unique('categories')->ignore($id)],
            'description' => ['required', 'string'],
            'image_file' => ['nullable', 'mimes:jpg,jpeg,png'],
            'meta_title' => ['required', 'string'],
            'meta_keyword' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
        ];
    }
}
