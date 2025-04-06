<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
            'title' => 'required|min:1|max:255',
            'status' => 'required',
        ];
    }

    public function prepareForValidation() {
        $this->mergeIfMissing([
            'image' => null,
        ]);

        $this->merge(['alias' => Str::slug($this->input('alias') ?: $this->input('title'))]);
    }

    public function messages(): array {
        return [
            'title.required' => 'Заполните поле «Название»',
            'title.min' => 'Поле «Название» должно содержать мин. 1 символ',
            'title.max' => 'Поле «Название» должно содержать макс. 255 символов',
        ];
    }
}
