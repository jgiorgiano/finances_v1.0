<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $table = "phone";

    public $timestamps = false;

    protected $fillable = [
        '_method', '_token', 'number', 'label'
    ];


}
