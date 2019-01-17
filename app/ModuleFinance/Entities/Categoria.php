<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $fillable = ['nome', 'group_id'];

    public $timestamps = false;

    
}
