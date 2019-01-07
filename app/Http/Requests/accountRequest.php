<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class accountRequest extends FormRequest
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
            '_method' => 'required',
            '_token' => 'required',           
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'gender' => 'required', 
        ];
    }
}
