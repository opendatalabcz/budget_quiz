<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PartyRequest extends FormRequest
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
        $unique_short_name = Rule::unique('App\Models\Party', 'short_name');
        $unique_name = Rule::unique('App\Models\Party', 'name');

        if ($this->party) {
            $unique_short_name->ignore($this->party);
            $unique_name->ignore($this->party);
        }

        return [
            'party_short_name' => [
                'bail',
                'max:50',
                $unique_short_name
            ],
            'party_name' => [
                'bail',
                'required',
                'max:150',
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
          'party_short_name.required' => 'Zkratka musí být zadána',
          'party_short_name.max' => 'Zkratka nesmí přesáhnout délku :max znaků',
          'party_short_name.unique' => 'Již existuje strana s touto zkratkou',
          'party_name.required' => 'Název musí být zadán',
          'party_name.max' => 'Název nesmí přesáhnout délku :max znaků',
          'party_name.unique' => 'Již existuje strana s tímto názvem'
        ];
    }
}
