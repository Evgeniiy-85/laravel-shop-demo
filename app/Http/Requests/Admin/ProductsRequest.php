<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'prod_title' => 'required|min:1|max:255',
            'prod_status' => 'required',
        ];
    }


    public function attributes() {
        return [
            'prod_title' => 'Название',
        ];
    }

    public function messages() {
        return [
            'prod_title.required' => 'Заполните поле Название',
            'prod_title.min' => 'Поле Название содержать мин. 1 символ',
            'prod_title.min' => 'Поле Название содержать макс. 255 символов',
        ];
    }
}
