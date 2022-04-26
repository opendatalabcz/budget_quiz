<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetCapitolRequest extends FormRequest
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
            'budget_capitol_number' => 'bail|required|numeric|unique:\App\Models\BudgetCapitol,number',
            'budget_capitol_name' => 'bail|required|max:100|unique:\App\Models\BudgetCapitol,name'
        ];
    }

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
