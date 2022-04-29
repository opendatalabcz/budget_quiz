<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Always returns true, authorization handled elsewhere.
     *
     * @return true
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unique_name = Rule::unique('App\Models\Education', 'name');

        if ($this->education) {
            $unique_name->ignore($this->education);
        }

        return [
            'education_name' => [
                'bail',
                'required',
                'max:100',
                $unique_name
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'education_name.required' => 'Název musí být zadán',
            'education_name.max' => 'Název nesmí přesáhnout délku :max znaků',
            'education_name.unique' => 'Již existuje vzdělání s tímto názvem'
        ];
    }
}
