<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\ModuleFinance\Repositories\FormaPagamentoRepository;
use App\ModuleFinance\Entities\FormaPagamento;

class FormaPagamentoController extends DetalhesController
{
    
    public function __construct(FormaPagamento $model)
    {        
        $this->repository = new FormaPagamentoRepository($model);
        $this->route = 'formapagamento';
        $this->title = 'Gerenciar Formas de Pagamento';

    }

}
