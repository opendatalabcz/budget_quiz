<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
        return [
            'question_number' => [
                'bail',
                'required',
                'numeric',
                'min:0'
            ],
            'question_title' => [
                'bail',
                'required',
                'max:100'
            ],
            'question_description' => [
                'bail',
                'required',
                'max:1500'
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
            'question_number.required' => 'Číslo otázky musí být zadáno',
            'question_number.min' => 'Číslo otázky musí být nezáporné číslo',
            'question_number.numeric' => 'Číslo otázky musí být číslo',
            'question_title.required' => 'Titulek musí být zadán',
            'question_title.max' => 'Titulek nesmí přesáhnout délku :max znaků',
            'question_description.required' => 'Popis musí být zadán',
            'question_description.max' => 'Popis nesmí přesáhnout délku :max znaků',
        ];
    }
}
