<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'desc' => 'required',
            'svg' => 'required|mimes:svg',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле название продукта является обязательным',
            'desc.required' => 'Поле описание является обязательным',
            'svg.required' => 'Поле svg является обязательным',
            'svg.mimes' => 'Формат только svg',
        ];
    }
}
