<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BudgetStateChangeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'budget_state_change_chapter_id' => [
                'bail',
                'required',
                'exists:\App\Models\BudgetChapter,id'
            ],
            'budget_state_change_first_year' => [
                'bail',
                'required',
                'numeric',
                'min:0'
            ],
            'budget_state_change_second_year' => [
                'bail',
                'required',
                'numeric',
                'min:0'
            ],
            'budget_state_change_third_year' => [
                'bail',
                'required',
                'numeric',
                'min:0'
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
            'budget_state_change_chapter_id.required' => 'Výdaj pro první rok musí být zadán',
            'budget_state_change_chapter_id.exists' => 'Zvolená kapitola neexistuje, zkuste obnovit stránku',
            'budget_state_change_first_year.required' => 'Příjem pro první rok musí být zadán',
            'budget_state_change_first_year.min' => 'Příjem pro první rok musí být nezáporné číslo',
            'budget_state_change_first_year.numeric' => 'Příjem pro první rok musí být číslo',
            'budget_state_change_second_year.required' => 'Příjem pro druhý rok musí být zadán',
            'budget_state_change_second_year.min' => 'Příjem pro druhý rok musí být nezáporné číslo',
            'budget_state_change_second_year.numeric' => 'Příjem pro druhý rok musí být číslo',
            'budget_state_change_third_year.required' => 'Příjem pro třetí rok musí být zadán',
            'budget_state_change_third_year.min' => 'Příjem pro třetí rok musí být nezáporné číslo',
            'budget_state_change_third_year.numeric' => 'Příjem pro třetí rok musí být číslo'
        ];
    }
}
