<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentsRequest extends FormRequest {

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
            'storage' => 'required|string',
            'field_name' => 'required|string',
            'multiple' => 'nullable|string',
            'attachments' =>  'required',
            'attachments.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ];
    }


    public function attributes(): array {
        return [
            'storage' => 'Название',
        ];
    }

    public function messages(): array {
        return [
            'attachments.required' => 'Не выбрал файл',
            'attachments.*.mimes' => 'Тип файла должен соответствовать типу: jpg, jpeg, png, gif, webp',
            'attachments.*.max' => 'Размер файла не должен превышать 4096 кб',
        ];
    }
}
