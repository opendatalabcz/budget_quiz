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
            'budget_state_change_income_first_year' => [
                'bail',
                'required',
                'numeric'
            ],
            'budget_state_change_income_second_year' => [
                'bail',
                'required',
                'numeric'
            ],
            'budget_state_change_income_third_year' => [
                'bail',
                'required',
                'numeric'
            ],
            'budget_state_change_expense_first_year' => [
                'bail',
                'required',
                'numeric'
            ],
            'budget_state_change_expense_second_year' => [
                'bail',
                'required',
                'numeric'
            ],
            'budget_state_change_expense_third_year' => [
                'bail',
                'required',
                'numeric'
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
            'budget_state_change_chapter_id.required' => 'Kapitola rozpočtu musí být zadána',
            'budget_state_change_chapter_id.exists' => 'Zvolená kapitola neexistuje, zkuste obnovit stránku',
            'budget_state_change_income_first_year.required' => 'Změna příjmu pro rok '. config('app.first_year') .' musí být zadána',
            'budget_state_change_income_first_year.numeric' => 'Změna příjmu pro rok '. config('app.first_year') .' musí být číslo',
            'budget_state_change_income_second_year.required' => 'Změna příjmu pro rok '. config('app.second_year') .' musí být zadána',
            'budget_state_change_income_second_year.numeric' => 'Změna příjmu pro rok '. config('app.second_year') .' musí být číslo',
            'budget_state_change_income_third_year.required' => 'Změna příjmu pro rok '. config('app.third_year') .' musí být zadána',
            'budget_state_change_income_third_year.numeric' => 'Změna příjmu pro rok '. config('app.third_year') .' musí být číslo',
            'budget_state_change_expense_first_year.required' => 'Změna výdaje pro rok '. config('app.first_year') .' musí být zadána',
            'budget_state_change_expense_first_year.numeric' => 'Změna výdaje pro rok '. config('app.first_year') .' musí být číslo',
            'budget_state_change_expense_second_year.required' => 'Změna výdaje pro rok '. config('app.second_year') .' musí být zadána',
            'budget_state_change_expense_second_year.numeric' => 'Změna výdaje pro rok '. config('app.second_year') .' musí být číslo',
            'budget_state_change_expense_third_year.required' => 'Změna výdaje pro rok '. config('app.third_year') .' musí být zadána',
            'budget_state_change_expense_third_year.numeric' => 'Změna výdaje pro rok '. config('app.third_year') .' musí být číslo'
        ];
    }
}
