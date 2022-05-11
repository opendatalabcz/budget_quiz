<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
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
            'answer_title' => [
                'bail',
                'required',
                'max:100'
            ],
            'answer_description' => [
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
            'answer_title.required' => 'Titulek musí být zadán',
            'answer_title.max' => 'Titulek nesmí přesáhnout délku :max znaků',
            'answer_description.required' => 'Popis musí být zadán',
            'answer_description.max' => 'Popis nesmí přesáhnout délku :max znaků',
        ];
    }
}
