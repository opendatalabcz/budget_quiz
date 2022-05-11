<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BudgetStateRequest extends FormRequest
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
            'budget_state_income_first_year'   => [
                'bail',
                'required',
                'numeric',
                'min:0'
            ],
            'budget_state_income_second_year'  => [
                'bail',
                'required',
                'numeric',
                'min:0'
            ],
            'budget_state_income_third_year'   => [
                'bail',
                'required',
                'numeric',
                'min:0'
            ],
            'budget_state_expense_first_year'  => [
                'bail',
                'required',
                'numeric',
                'min:0'
            ],
            'budget_state_expense_second_year' => [
                'bail',
                'required',
                'numeric',
                'min:0'
            ],
            'budget_state_expense_third_year'  => [
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
            'budget_state_income_first_year.required' => 'Příjem pro rok '. config('app.first_year') .' musí být zadán',
            'budget_state_income_first_year.min' => 'Příjem pro rok '. config('app.first_year') .' musí být nezáporné číslo',
            'budget_state_income_first_year.numeric' => 'Příjem pro rok '. config('app.first_year') .' musí být číslo',
            'budget_state_income_second_year.required' => 'Příjem pro rok '. config('app.second_year') .' musí být zadán',
            'budget_state_income_second_year.min' => 'Příjem pro rok '. config('app.second_year') .' musí být nezáporné číslo',
            'budget_state_income_second_year.numeric' => 'Příjem pro rok '. config('app.second_year') .' musí být číslo',
            'budget_state_income_third_year.required' => 'Příjem pro rok '. config('app.third_year') .' musí být zadán',
            'budget_state_income_third_year.min' => 'Příjem pro rok '. config('app.third_year') .' musí být nezáporné číslo',
            'budget_state_income_third_year.numeric' => 'Příjem pro rok '. config('app.third_year') .' musí být číslo',
            'budget_state_expense_first_year.required' => 'Výdaj pro rok '. config('app.first_year') .' musí být zadán',
            'budget_state_expense_first_year.min' => 'Výdaj pro rok '. config('app.first_year') .' musí být nezáporné číslo',
            'budget_state_expense_first_year.numeric' => 'Výdaj pro rok '. config('app.first_year') .' musí být číslo',
            'budget_state_expense_second_year.required' => 'Výdaj pro rok '. config('app.second_year') .' musí být zadán',
            'budget_state_expense_second_year.min' => 'Výdaj pro rok '. config('app.second_year') .' musí být nezáporné číslo',
            'budget_state_expense_second_year.numeric' => 'Výdaj pro rok '. config('app.second_year') .' musí být číslo',
            'budget_state_expense_third_year.required' => 'Výdaj pro rok '. config('app.third_year') .' musí být zadán',
            'budget_state_expense_third_year.min' => 'Výdaj pro rok '. config('app.third_year') .' musí být nezáporné číslo',
            'budget_state_expense_third_year.numeric' => 'Výdaj pro rok '. config('app.third_year') .' musí být číslo'
        ];
    }
}
