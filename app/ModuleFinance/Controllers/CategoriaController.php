<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\ModuleFinance\Repositories\CategoriaRepository;
use App\ModuleFinance\Entities\Categoria;

class CategoriaController extends DetalhesController
{
    
    public function __construct(Categoria $categoria)
    {        
        $this->repository = new CategoriaRepository($categoria);

    }

}
