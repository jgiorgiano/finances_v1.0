<?php

namespace App\Services;

use App\Group;
use App\GroupMember;
use App\User;
use App\Mail\inviteNewUser;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\groupRequest;
use App\Repositories\GroupRepository;
use App\Repositories\UserRepository;
use App\Repositories\GroupMemberRepository;

class groupService {

    protected $repository;

    public function __construct(Group $group, User $user, GroupMember $groupMember)
    {
        $this->repository = new GroupRepository($group);
        $this->user = new UserRepository($user); 
        $this->member = new GroupMemberRepository($groupMember);
    }


    public function homeIndex($id)
    {
       
        return $this->repository->memberGroups($id);

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

    public function invite($email, $user_id, $group_id)
    {
       
// Check if the user has Account
        if(empty($this->user->userByEmail($email)->email)){

    //If Not, create an Invitation       
            try{
               
                $token = bin2hex(random_bytes(32));
                
                $invited = \App\Invitation::create([                
                    'email'     => $email,
                    'token'     => $token,
                    'group_id'  => $group_id,
                    'host_id'   => $user_id
                ]);

                $data['invite']     = $invited;               
                $data['group']      = $this->repository->show($group_id)->nome;
                $data['host']       = $this->user->show($user_id)->first_name;

                Mail::to($invited->email)->queue(new inviteNewUser($data));

                                    
            }

            catch(Exception $e)
            {
                var_dump($e);
            }



        }else{

            try{

                $this->createMember($group_id, $this->user->userByEmail($email)->id);

                var_dump('send Email to notify and in App Notification');
            
                }

            catch(Exception $e){

                var_dump($e);


            }

        }

    }

    public function joinGroup($user_id, $group_id)
    {

      return  $this->member->memberAccept($user_id, $group_id);



    }

    public function deleteMember($group_id, $user_id)
    {

        return $this->member->deleteMember($group_id, $user_id);

       
    }

    public function createMember($group_id, $user_id)
    {
        return $this->member->create([
            'group_id'          => $group_id,
            'user_id'           => $user_id,
            'nivel_acesso_id'   => 1,
        ]);
        
    }


 }


