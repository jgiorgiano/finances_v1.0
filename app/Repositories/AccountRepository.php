<?php

namespace App\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

class AccountRepository extends Repository{

    protected $model;

//get All Address related to the Account Id.
    public function address($id)
    {
        $address = DB::table('address')->where('users_user_id', $id)->get();

        return $address;
    }

    public function phone($id)
    {
        $phone = DB::table('phone')->where('users_user_id', $id)->get();

        return $phone;
    }

   


}