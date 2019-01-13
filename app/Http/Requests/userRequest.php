<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'username'      => ['required', 'string', 'max:20'],
            'first_name'    => ['required', 'string', 'max:45'],
            'last_name'     => ['required', 'string', 'max:45'],
            'birthday'      => ['required', 'date'],
            'gender'        => ['required', 'string', 'max:1'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }
}
