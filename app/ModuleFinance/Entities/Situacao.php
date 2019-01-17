<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    protected $table = 'situacao';

    protected $fillable = ['nome', 'group_id'];

    public $timestamps = false;

    
}
