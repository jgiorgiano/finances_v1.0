<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = "address";

    public $timestamps = false;

    protected $fillable = [
        '_method',
        '_token',
        'postcode', 
        'address', 
        'number', 
        'name', 
        'city', 
        'user_id'
    ];
}
