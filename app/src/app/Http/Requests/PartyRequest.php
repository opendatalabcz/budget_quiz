<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartyRequest extends FormRequest
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
            'party_short_name' => 'bail|required|max:50|unique:\App\Models\Party,short_name',
            'party_name' => 'bail|required|max:150\App\Models\Party,name'
        ];
    }

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
