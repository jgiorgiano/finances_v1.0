<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $table = "group_has_users";

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'group_id',
        'nivel_acesso_id',
        'accepted_at',
        'remember_token'
    ];

}
