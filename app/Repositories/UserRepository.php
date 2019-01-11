<?php

namespace App\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository{
/* 
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }  */

//get All Address related to the Account Id.
    public function address($id)
    {
        $address = DB::table('address')->where('user_id', $id)->get();

        return $address;
    }

    public function phone($id)
    {
        $phone = DB::table('phone')->where('user_id', $id)->get();

        return $phone;
    }

    public function userByEmail($email)
    {

        return DB::table('users')->where('email', $email)->first();

        
    }
   


}