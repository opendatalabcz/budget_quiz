<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BudgetCapitolRequest extends FormRequest
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
        $unique_number = Rule::unique('App\Models\BudgetCapitol', 'number');
        $unique_name = Rule::unique('App\Models\BudgetCapitol', 'name');

        if ($this->budget_capitol) {
            $unique_number->ignore($this->budget_capitol);
            $unique_name->ignore($this->budget_capitol);
        }

        return [
            'budget_capitol_number' => [
                'bail',
                'required',
                'numeric',
                $unique_number
            ],
            'budget_capitol_name' => [
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
            'budget_capitol_number.required' => 'Číslo kapitoly musí být zadáno',
            'budget_capitol_number.numeric' => 'Tento údaj musí být číselný',
            'budget_capitol_number.unique' => 'Již existuje kapitola s tímto číslem',
            'budget_capitol_name.required' => 'Název musí být zadán',
            'budget_capitol_name.max' => 'Název nesmí přesáhnout délku :max znaků',
            'budget_capitol_name.unique' => 'Již existuje kapitola s tímto názvem'
        ];
    }
}
