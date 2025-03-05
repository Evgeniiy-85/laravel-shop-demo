<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }


    /**
     * @return string[]
     */
    public function rules(): array {
        return [
            'cat_title' => 'required|min:1|max:255',
            'cat_status' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'cat_title.required' => 'Заполните поле «Название»',
            'cat_title.min' => 'Поле «Название» должно содержать мин. 1 символ',
            'cat_title.max' => 'Поле «Название» должно содержать макс. 255 символов',
        ];
    }
}
