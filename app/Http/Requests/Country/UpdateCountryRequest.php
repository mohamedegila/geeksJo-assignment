<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
            'name' => 'required_without:code|min:3|max:255|unique:countries,id,'.$this->id,
            'code' => 'required_without:name|string|min:2|unique:countries,id,'.$this->id
        ];
    }
}
