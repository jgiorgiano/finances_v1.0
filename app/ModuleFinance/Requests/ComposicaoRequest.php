<?php

namespace App\ModuleFinance\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComposicaoRequest extends FormRequest
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
            //parcelamento
            'pgto.*.valor'             => 'required|numeric',
            'pgto.*.contaCorrente'     => 'required|numeric',
            'pgto.*.formaPagamento'    => 'required|numeric',                     
        ];
    }
}
