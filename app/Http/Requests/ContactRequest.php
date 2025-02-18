<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:5|max:55',
            'email' => 'required|min:5|max:55',
            'comment' => 'required|min:5|max:55',
        ];
    }


    public function attributes() {
        return [
            'name' => 'имя',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Заполните поле Имя',
            'comment.required' => 'Заполните поле Комментарий',
            'email.required' => 'Заполните поле email',


            'email.min' => 'Поле email содержать мин. 5 символов',
            'name.min' => 'Поле Имя должно содержать мин. 5 символов',
            'comment.min' => 'Поле Комментарий  должно содержать мин. 5 символов',
        ];
    }
}
