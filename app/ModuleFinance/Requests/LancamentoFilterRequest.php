<?php

namespace App\ModuleFinance\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LancamentoFilterRequest extends FormRequest
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
            'cat' => 'integer',
            'fin' => 'integer'
        ];
    }

    public function prepareForValidation(){

        $this->replace([
            'cat' => (int) $this->input('cat'),
            'fin' => (int) $this->input('fin'),            
        ]);
    }
}
