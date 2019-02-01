<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class Parcelamento extends Model
{
    protected $table = 'parcelamento';

    protected $fillable = [
        'valor', 
        'vencimento', 
        'numero_parcial'
    ];

    public function composicoes()
    {
        return $this->hasMany('App\ModuleFinance\Entities\Composicao');
    }

    public function lancamento()
    {
        return $this->belongsTo('App\ModuleFinancen\Entities\Lancamento');
    }

}
