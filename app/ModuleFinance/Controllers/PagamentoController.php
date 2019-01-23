<?php

namespace App\ModuleFinance\Controllers;

use App\ModuleFinance\Services\PagamentoService;

class PagamentoController extends AbstractLancamentoController
{
    
    public function __construct(PagamentoService $service)    {        
        
        $this->service = $service;
        $this->sectionName = 'Contas a Pagar';
        $this->route = 'pagamentos';

    }
}
