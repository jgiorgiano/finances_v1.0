<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class Parcelamento extends Model
{
    protected $table = ['parcelamento'];

    protected $fillable = [
        'valor', 
        'vencimento', 
        'numero_parcial'
    ];

}
