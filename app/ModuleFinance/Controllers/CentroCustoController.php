<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\ModuleFinance\Repositories\CentroCustoRepository;
use App\ModuleFinance\Entities\CentroCusto;

class CentroCustoController extends DetalhesController
{
    
    public function __construct(CentroCusto $model)
    {        
        $this->repository = new CentroCustoRepository($model);

    }

}
