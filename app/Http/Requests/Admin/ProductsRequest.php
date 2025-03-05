<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest {

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
            'prod_title' => 'required|min:1|max:128',
            'prod_alias' => 'nullable|min:1|max:128',
            'prod_status' => 'required',
            'prod_short_desc' => 'nullable|string|max:256',
            'prod_desc' => 'nullable|string',
        ];
    }

    public function messages(): array {
        return [
            'prod_title.required' => 'Заполните поле «Название»',
            'prod_title.min' => 'Поле «Название» должно содержать мин. 1 символ',
            'prod_title.max' => 'Поле «Название» должно содержать макс. 128 символов',
            'prod_alias.min' => 'Поле «Алиас» должно содержать мин. 1 символ',
            'prod_alias.max' => 'Поле «Алиас» должно содержать макс. 128 символов',
            'prod_short_desc.max' => 'Поле «Название» должно содержать макс. 255 символов',
        ];
    }
}
