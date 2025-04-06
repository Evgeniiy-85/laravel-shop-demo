<?php

namespace App\Http\Requests\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Http\FormRequest;

class ExtensionsRequest extends FormRequest {

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
            'params' => 'nullable|array',
        ];
    }

    public function prepareForValidation() {
        $this->mergeIfMissing([
            'params'  => '',
        ]);
    }

    /**
     * @param $params
     * @return void
     */
    public function setParamsAttribute($params) {
        $this->attributes['params'] = collect($params)->toJson();
    }
}
