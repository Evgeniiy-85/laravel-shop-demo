<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
            'title' => 'required|min:1|max:128',
            'alias' => 'nullable|min:1|max:128',
            'status' => 'required',
            'short_desc' => 'nullable|string|max:256',
            'desc' => 'nullable|string',
        ];
    }

    public function prepareForValidation() {
        $this->mergeIfMissing([
            'images' => null,
        ]);

        $this->merge(['alias' => Str::slug($this->input('alias') ?: $this->input('title'))]);
    }

    public function messages(): array {
        return [
            'title.required' => 'Заполните поле «Название»',
            'title.min' => 'Поле «Название» должно содержать мин. 1 символ',
            'title.max' => 'Поле «Название» должно содержать макс. 128 символов',
            'alias.min' => 'Поле «Алиас» должно содержать мин. 1 символ',
            'alias.max' => 'Поле «Алиас» должно содержать макс. 128 символов',
            'short_desc.max' => 'Поле «Название» должно содержать макс. 255 символов',
        ];
    }
}
