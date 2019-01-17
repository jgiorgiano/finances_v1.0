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
            'categoria_id'      => 'required|integer',
            'grupo_financeiro'  => 'required|integer',                      
            'nome'              => 'required',            
            'data_emissao'      => 'required|date',
            'numero_documento'  => 'required', 
            'conta_corrente'    => 'required|integer',           
            
            //parcelamento
            'valor'             => 'required|numeric',
            'vencimento'        => 'required|date',
        ];
    }
}
