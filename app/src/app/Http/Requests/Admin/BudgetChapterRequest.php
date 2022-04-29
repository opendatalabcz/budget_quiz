<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BudgetChapterRequest extends FormRequest
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
        $unique_number = Rule::unique('App\Models\BudgetChapter', 'number');
        $unique_name = Rule::unique('App\Models\BudgetChapter', 'name');

        if ($this->budget_chapter) {
            $unique_number->ignore($this->budget_chapter);
            $unique_name->ignore($this->budget_chapter);
        }

        return [
            'budget_chapter_number' => [
                'bail',
                'required',
                'numeric',
                $unique_number
            ],
            'budget_chapter_name' => [
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
            'budget_chapter_number.required' => 'Číslo kapitoly musí být zadáno',
            'budget_chapter_number.numeric' => 'Tento údaj musí být číselný',
            'budget_chapter_number.unique' => 'Již existuje kapitola s tímto číslem',
            'budget_chapter_name.required' => 'Název musí být zadán',
            'budget_chapter_name.max' => 'Název nesmí přesáhnout délku :max znaků',
            'budget_chapter_name.unique' => 'Již existuje kapitola s tímto názvem'
        ];
    }
}
