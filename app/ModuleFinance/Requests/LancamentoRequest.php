<?php

namespace App\ModuleFinance\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LancamentoRequest extends FormRequest
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
            'categoria'      => 'required|integer',
            'grupoFinanceiro'  => 'required|integer',                      
            'nome'              => 'required',            
            'dataEmissao'      => 'required|date',
            'numeroDocumento'  => 'required',                        
            
            //parcelamento
            'parcela.*.valor'             => 'required|numeric',
            'parcela.*.vencimento'        => 'required|date',
            'parcela.*.numero'            => 'required',
        ];
    }
}
