<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class ContaCorrente extends Model
{
    protected $table = 'conta_corrente';

    protected $fillable = ['nome'];

    public $timestamps = false;

    
}
