<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest {

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
            //'settings.site_name' => 'required|min:1|max:128',
        ];
    }

    public function messages(): array {
        return [
            'settings.site_name.required' => 'Заполните поле «Название сайта»',
        ];
    }
}
