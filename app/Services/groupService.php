<?php

namespace App\Services;

use App\Group;
use App\GroupMember;
use App\User;
use App\Http\Requests\groupRequest;
use App\Repositories\GroupRepository;
use App\Repositories\AccountRepository;
class groupService {

    protected $repository;

    public function __construct(Group $group, User $user, GroupMember $groupMember)
    {
        $this->repository = new GroupRepository($group);
        $this->user = new AccountRepository($user); 
        $this->member = $groupMember;
    }


    public function homeIndex($id)
    {
       
        return $this->repository->groupsWithOwner($id);

    }

    public function all()
    {

        return $this->repository->all();
    }

    public function store($request, $owner_id)
    {
        $request['owner_id'] = $owner_id;
        $request['created_at'] = date("Y-m-d H:i");

        $group = $this->repository->create($request);
        
        $this->member->create([
             'user_id'          => $group->owner_id,
             'group_id'         => $group->id,
             'nivel_acesso_id'  => 3 ,
             'accepted_at'      => date('Y-m-d H:m')
         ]);
        
        return $group;
    }


    public function show($groupId)
    {
        $members    = $this->repository->groupMembers($groupId);
        $group      = $this->repository->show($groupId);

        return array('members' => $members, 'group' => $group);
    }

    public function update($request, $user_id, $group_id)
    {        
        $this->repository->update($request, $group_id);
    }

    public function delete($user_id, $group_id)
    {

       if($user_id == $this->repository->show($group_id)->owner_id){

            $this->repository->delete($group_id);
        
       }

       return 'fail';


    }

    public function Invite($request, $user_id, $group_id)
    {

        dd($request);

        $this->user->userByEmail();


    }


 }


