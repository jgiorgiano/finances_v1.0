<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class CentroCusto extends Model
{
    protected $table = 'centro_custo';

    protected $fillable = ['nome'];

    public $timestamps = false;

    
}
