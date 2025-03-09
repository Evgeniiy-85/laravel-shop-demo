<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductsSettingsRequest extends FormRequest {

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

        ];
    }

    public function messages(): array {
        return [

        ];
    }
}
