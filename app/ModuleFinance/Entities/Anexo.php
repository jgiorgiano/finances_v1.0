<?php

namespace App\ModuleFinance\Entities;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    protected $table = 'anexo';

    protected $fillable = ['path'];
}
