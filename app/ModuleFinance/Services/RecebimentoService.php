<?php

namespace App\ModuleFinance;

use App\ModuleFinance\Repositories\LancamentoRepository;
use App\ModuleFinance\Entities\Lancamento;

class RecebimentoService {

    protected $repository;

    public function __construct(Lancamento $model)
    {
        $this->repository   = new LancamentoRepository($model);

    }
}