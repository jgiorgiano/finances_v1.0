<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class GrupoFinanceiro extends Model
{
    protected $table = 'grupo_financeiro';

    protected $fillable = ['nome', 'group_id'];

    public $timestamps = false;

    
}
