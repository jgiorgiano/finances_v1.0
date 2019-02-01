<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    protected $table = 'lancamento';

    protected $fillable = [
        'nome', 
        'tipo', 
        'data_emissao', 
        'numero_documento', 
        'observacao',        
    ];

    public function get($id)
    {       
        return Lancamento::find($id);
    }

    public function parcelas()
    {
        return $this->hasMany('App\ModuleFinance\Entities\Parcelamento');
    }

    
    
}
