<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest {

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
            'user_email' => 'required|min:6|max:64',
            'user_name' => 'required|min:2|max:128',
            'user_surname' => 'nullable|min:2|max:128',
            'user_patronymic' => 'nullable|min:2|max:128',
            'user_phone' => 'nullable|min:6|max:128',
            'user_password' => 'nullable|min:6|max:64',
            'user_status' => 'required',
            'user_role' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array {
        return [
            'user_email.required' => 'Заполните поле «E-mail»',
            'user_email.min' => 'Поле «E-mail» должно содержать мин. 6 символ',
            'user_email.max' => 'Поле «E-mail» должно содержать макс. 64 символов',

            'user_name.required' => 'Заполните поле «Имя»',
            'user_name.min' => 'Поле «Имя» должно содержать мин. 6 символ',
            'user_name.max' => 'Поле «Имя» должно содержать макс. 128 символов',

            'user_surname.min' => 'Поле «Фамилия» должно содержать мин. 2 символа',
            'user_surname.max' => 'Поле «Фамилия» должно содержать макс. 128 символов',

            'user_patronymic.min' => 'Поле «Отчество» должно содержать мин. 2 символ',
            'user_patronymic.max' => 'Поле «Отчество» должно содержать макс. 128 символов',

            'user_phone.min' => 'Поле «Телефон» должно содержать мин. 6 символ',
            'user_phone.max' => 'Поле «Телефон» должно содержать макс. 64 символов',

            'user_password.min' => 'Поле «Пароль» должно содержать мин. 6 символ',
            'user_password.max' => 'Поле «Пароль» должно содержать макс. 64 символов',
        ];
    }
}
