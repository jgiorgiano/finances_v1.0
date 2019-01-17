<?php

namespace App\ModuleFinance;

use App\ModuleFinance\Repositories\ComposicaoRepository;
use App\ModuleFinance\Entities\Composicao;

class ComposicaoService {

    protected $repository;

    public function __construct(Composicao $model)
    {
        $this->repository   = new ComposicaoRepository($model);

    }
}