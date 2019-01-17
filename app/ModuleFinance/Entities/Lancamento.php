<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    protected $table = ['lancamento'];

    protected $fillable = [
        'nome', 
        'tipo', 
        'data_emissao', 
        'numero_documento', 
        'observacao',        
    ];
    
}
