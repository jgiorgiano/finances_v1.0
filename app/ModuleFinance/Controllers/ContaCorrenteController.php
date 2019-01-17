<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\ModuleFinance\Repositories\ContaCorrenteRepository;
use App\ModuleFinance\Entities\ContaCorrente;

class ContaCorrenteController extends DetalhesController
{
    
    public function __construct(ContaCorrente $model)
    {        
        $this->repository = new ContaCorrenteRepository($model);
        $this->route = 'contacorrente';
        $this->title = 'Gerenciar Contas Corrente';

    }

}
