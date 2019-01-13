<?php

namespace App\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;


class GroupMemberRepository extends Repository{

    public function deleteMember($group_id, $user_id)
    {
        return DB::table('group_has_users')
        ->where([
            ['group_id', $group_id],
            ['user_id',  $user_id]
        ])
        ->delete();
    }

    public function memberAccept($group_id, $user_id)
    {
        return DB::table('group_has_users')
        ->where([
            ['group_id', $group_id],
            ['user_id',  $user_id]
        ])
        ->update([
            'accepted_at' => date('Y-m-d H:i')
        ]);
    }
   

}