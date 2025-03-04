<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'cat_title' => 'required|min:1|max:255',
            'cat_status' => 'required',
            'cat_image' => 'nullable|string'
//            required|image|max:1024|mimes:jpg,jpeg,png
//            nullable|image|max:1024|mimes:jpg,jpeg,png
        ];
    }


    public function attributes() {
        return [
            'cat_title' => 'Название',
        ];
    }

    public function messages() {
        return [
            'cat_title.required' => 'Заполните поле Название',
            'cat_title.min' => 'Поле Название содержать мин. 1 символ',
            'cat_title.max' => 'Поле Название содержать макс. 255 символов',
        ];
    }
}
