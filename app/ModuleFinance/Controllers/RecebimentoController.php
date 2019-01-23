<?php

namespace App\ModuleFinance\Controllers;

use App\ModuleFinance\Services\RecebimentoService;

class RecebimentoController extends AbstractLancamentoController
{
    
    public function __construct(RecebimentoService $service){        
        
        $this->service = $service;
        $this->sectionName = 'Contas a Receber';
        $this->route = 'recebimentos';

    }
}