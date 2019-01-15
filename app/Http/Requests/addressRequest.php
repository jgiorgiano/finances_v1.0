<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addressRequest extends FormRequest
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
            'postcode'  =>'required',
            'address'   => 'required',
            'number'    => 'required_if:name,',
            'name'      => 'required_if:number,',
            'city'      => 'required',
        ];
    }

    public function attribute()
    {
       
    }

    public function messages()
    {
        return ['postcode.required' => 'Postcode is required',
        ];
    }
}
