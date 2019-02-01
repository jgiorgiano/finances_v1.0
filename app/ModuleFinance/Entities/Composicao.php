<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class Composicao extends Model
{
    protected $table = ['composicao_pagamento'];

    protected $fillable = [
        'valor', 'group_id'         
    ];

    public function parcelamento()
    {
        return $this->belongsTo('App\ModuleFinance\Entities\Parcelamento');
    }
    
}
