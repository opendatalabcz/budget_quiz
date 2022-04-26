<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionRequest extends FormRequest
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
            'region_name' => 'bail|required|max:100|unique:\App\Model\Region,name'
        ];
    }

    public function messages()
    {
        return [
            'region_name.required' => 'Název musí být zadán',
            'region_name.max' => 'Název nesmí přesáhnout délku :max znaků',
            'region_name.unique' => 'Již existuje kraj s tímto názvem'
        ];
    }
}
