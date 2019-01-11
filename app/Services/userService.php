<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Http\Requests\userRequest;
use App\User;

class userService {

    protected $repository;

    public function __construct(User $user)
    {
        $this->repository  = new UserRepository($user);
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







}
