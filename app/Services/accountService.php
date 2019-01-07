<?php

namespace App\Services;

use App\Repositories\AccountRepository;
use App\Http\Requests\accountRequest;
use App\User;

class accountService {


    protected $request;
    protected $repository;

    public function __construct(User $user)
    {
        $this->repository  = new AccountRepository($user);
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
