<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest {

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
            'client_email' => 'required|min:6|max:64',
            'client_name' => 'required|min:2|max:128',
            'client_surname' => 'nullable|min:2|max:128',
            'client_patronymic' => 'nullable|min:2|max:128',
            'client_phone' => 'nullable|min:6|max:128',
        ];
    }

    /**
     * @return string[]
     */

    public function messages(): array {
        return [
            'client_email.required' => 'Заполните поле «E-mail»',
            'client_email.min' => 'Поле «E-mail» должно содержать мин. 6 символ',
            'client_email.max' => 'Поле «E-mail» должно содержать макс. 64 символов',

            'client_name.required' => 'Заполните поле «Имя»',
            'client_name.min' => 'Поле «Имя» должно содержать мин. 2 символа',
            'client_name.max' => 'Поле «Имя» должно содержать макс. 128 символов',

            'client_surname.min' => 'Поле «Фамилия» должно содержать мин. 6 символ',
            'client_surname.max' => 'Поле «Фамилия» должно содержать макс. 128 символов',

            'client_patronymic.min' => 'Поле «Отчество» должно содержать мин. 6 символ',
            'client_patronymic.max' => 'Поле «Отчество» должно содержать макс. 128 символов',

            'client_phone.min' => 'Поле «Телефон» должно содержать мин. 6 символ',
            'client_phone.max' => 'Поле «Телефон» должно содержать макс. 64 символов',
        ];
    }
}
