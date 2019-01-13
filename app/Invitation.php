<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invitation extends Model
{
    protected $table = 'invitation'; 

    public $timestamps = false;

    protected $fillable = [
        'email',
        'token',
        'group_id',
        'host_id',
    ];

    public function getByEmail($email)
    {
        return DB::table('invitation')->where('email', $email)->first();

    }

}
