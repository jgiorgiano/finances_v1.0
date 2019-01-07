<?php

namespace App\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

class AccountRepository extends Repository{

    protected $model;

//Get all instance of model
    public function all()
    {
        return $this->model->all();
    }

// create a new record in Database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

// Update a record in Database
    public function update(array $data, $id)
    {
        $row = $this->model->findOrFail($id);
        return $row->update($data);
    }

// Delete a record in Database
    public function Delete($id)
    {
        return $this->model->destroy($id);
    }

// Show a specific record
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }    

// Get the model
    public function getModel()
    {
        return $this->model;
    }

//Set the associate Model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

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