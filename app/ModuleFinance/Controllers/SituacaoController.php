<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\ModuleFinance\Repositories\SituacaoRepository;
use App\ModuleFinance\Entities\Situacao;

class SituacaoController extends DetalhesController
{
    
    public function __construct(Situacao $model)
    {        
        $this->repository = new SituacaoRepository($model);

    }

}
