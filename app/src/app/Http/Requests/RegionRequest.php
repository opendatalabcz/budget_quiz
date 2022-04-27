<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Always returns true, authorization handled elsewhere.
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
        $unique_name = Rule::unique('App\Models\Region', 'name');

        if ($this->region) {
            $unique_name->ignore($this->region);
        }

        return [
            'region_name' => [
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
            'region_name.required' => 'Název musí být zadán',
            'region_name.max' => 'Název nesmí přesáhnout délku :max znaků',
            'region_name.unique' => 'Již existuje kraj s tímto názvem'
        ];
    }
}
