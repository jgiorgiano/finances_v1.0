<?php

namespace App\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;


class GroupMemberRepository extends Repository{

    public function deleteMember($user_id, $group_id)
    {        
        return DB::table('group_has_users')
        ->where([
            ['group_id', $group_id],
            ['user_id',  $user_id]
        ])
        ->delete();
    }

    public function memberAccept($user_id, $group_id)
    {
        
        $teste = DB::table('group_has_users')
        ->where([
            ['group_id', $group_id],
            ['user_id',  $user_id]
        ])
        ->update([
            'accepted_at' => date('Y-m-d H:i')
        ]);
        
    }
    /**
     * get an array with all the groups that users is member
     * 
     * return Array
     */
    public static function hasGroups()
    {
        $groups = DB::table('group_has_users')
            ->select('group_id')
            ->where([
                ['user_id', \Auth::id()],
               // ['accepted_at',  '!=',  null]
            ])
            ->groupBy('group_id')
            ->get();
        
        $results = array();

            foreach($groups as $group){
                $results[] = $group->group_id;
            }

            return $results;
        
    }

   

}