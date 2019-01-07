<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;

class Repository implements RepositoryInterface{

    protected $model;

//Inject Dependancy    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

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


}