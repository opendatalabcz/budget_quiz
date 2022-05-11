<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * User is always authorized for this request
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
        return [
            'quiz_age' => [
                'bail',
                'required',
                'numeric',
                'min:0',
                'max:150'
            ],
            'quiz_region' => [
                'bail',
                'required',
                'exists:\App\Models\Region,id'
            ],
            'quiz_education' => [
                'bail',
                'required',
                'exists:\App\Models\Education,id'
            ],
            'quiz_party' => [
                'bail',
                'required',
                'exists:\App\Models\Party,id'
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
            'quiz_region.required' => 'Kraj musí být vyplněn',
            'quiz_region.exists' => 'Nastala chyba, obnovte prosím stránku',
            'quiz_education.required' => 'Vzdělání musí být vyplněno',
            'quiz_education.exists' => 'Nastala chyba, obnovte prosím stránku',
            'quiz_party.required' => 'Politická strana musí být vyplněna',
            'quiz_party.exists' => 'Nastala chyba, obnovte prosím stránku',
            'quiz_age.required' => 'Věk musí být vyplněn',
            'quiz_age.numeric' => 'Věk musí být číslo',
            'quiz_age.min' => 'Věk musí být větší nesmí být menší než :min',
            'quiz_age.max' => 'Věk musí být větší nesmí být větší než :max',
        ];
    }
}
