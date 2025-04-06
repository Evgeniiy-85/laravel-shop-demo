<?php

namespace App\Modules\Extensions\Trainings\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TrainingRequest extends FormRequest {

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
            'title' => 'required|string|min:1|max:128',
            'image' => 'nullable|string',
            'params' => 'nullable|array',
            'alias' => 'nullable|string|min:1|max:128',
        ];
    }

    public function prepareForValidation() {
        $this->mergeIfMissing([
            'params'  => '',
            'image' => '',
        ]);

        $this->merge(['alias' => Str::slug($this->input('alias') ?: $this->input('title'))]);
    }

    public function messages(): array {
        return [
            'title' => 'Заполните поле «Название»',
            'title.max' => 'Значение для поля «Название» не должно превышать 128 символов',
        ];
    }
}
