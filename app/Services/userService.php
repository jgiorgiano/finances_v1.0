<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Http\Requests\userRequest;
use App\Services\groupService;
use App\User;

class userService {

    protected $repository;

    public function __construct(User $user, groupService $group)
    {
        $this->repository   = new UserRepository($user);
        $this->group        = $group; 
    }

    public function getFullRegister($id)
    {     
        $user           = $this->repository->show($id); 
        $address        = $this->repository->address($id);
        $phone          = $this->repository->phone($id);

        return array('user' => $user, 'address' => $address, 'phone' => $phone);

    }

    public function update($data, $id)    
    {

       $result = $this->repository->update($data, $id);

    }

    public function invitedForm($email, $token)
    {

        try{

            $invitation = new \App\Invitation();

            $row = $invitation->getByEmail($email);

            if($row->token == $token){

                return $row;
                
            }

                return session()->flash('convite nao encontrado');

        }catch(Exception $e){

            dd($e);


        } 

    }


    public function invitedRegister($request)
    { 

       $newUser = $this->repository->create($request);
       
        $invitation = new \App\Invitation();
       
        $invited = $invitation->getByEmail($newUser->email);       
       
        $this->group->createMember($newUser->id, $invited->group_id);

        $invitation->destroy($invited->id);


    return session()->flash('usuario criado com sucesso');
    
    }







}
