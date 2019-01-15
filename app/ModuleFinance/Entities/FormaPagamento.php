<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    protected $table = 'forma_pagamento';

    protected $fillable = ['nome'];

    public $timestamps = false;

    
}
