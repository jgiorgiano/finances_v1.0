<?php

namespace App\Repositories;

use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

class GroupRepository extends Repository{

    protected $model;

    public function groupsWithOwner($id)
    {
    
        return 
        DB::table('group')
        ->select('group.*', 'users.username')
        ->where('group.owner_id', $id)
        ->join('users', 'group.owner_id', '=', 'users.id' )
        ->get();

    }

    public function groupMembers($group_id)
    {
        return 
        DB::table('group_has_users')
        ->select(           
            'users.id', 
            'users.username',
            'users.first_name',
            'users.last_name', 
            'users.email',
            'group_has_users.nivel_acesso_id',
            'group_has_users.accepted_at',
            'nivel_acesso.nome as nivel_acesso')
        ->where('group_has_users.group_id', $group_id)
        ->join('users', 'group_has_users.user_id', '=', 'users.id')
        ->join('nivel_acesso', 'group_has_users.nivel_acesso_id', '=', 'nivel_acesso.id')
        ->get();        
    }


    public function memberGroups($user_id)
    {

        return DB::table('group_has_users')
        ->select(
            'group.*',
            'users.first_name',
            'users.last_name',
            'group_has_users.nivel_acesso_id',
            'group_has_users.accepted_at')
        ->where('user_id', $user_id)
        ->join('group', 'group_has_users.group_id', '=', 'group.id')
        ->join('users', 'group.owner_id', '=', 'users.id')
        ->get();

    }

    


    
   


}