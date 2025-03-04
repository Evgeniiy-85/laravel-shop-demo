<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array {
        return [
            'storage' => 'required|string',
            'field_name' => 'required|string',
            'multiple' => 'nullable|string',
            'attachments' =>  'required',
            'attachments.*' => 'image|mimes:mimes:jpg,jpeg,png,webp|max:4096',
        ];
    }


    public function attributes() {
        return [
            'storage' => 'Название',
        ];
    }

    public function messages() {
        return [
            'attachments.required' => 'Файл обязателен к отправке',
            'attachments.mimes' => 'Тип файла должен быть jpg, jpeg, png, gif',
            'attachments.max' => 'Поле Название содержать макс. 255 символов',
        ];
    }
}
