<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\ModuleFinance\Repositories\GrupoFinanceiroRepository;
use App\ModuleFinance\Entities\GrupoFinanceiro;

class GrupoFinanceiroController extends DetalhesController
{
    
    public function __construct(GrupoFinanceiro $model)
    {        
        $this->repository = new GrupoFinanceiroRepository($model);
        $this->route = 'grupofinanceiro';
        $this->title = 'Gerenciar Grupos Financeiros';
    }

}
