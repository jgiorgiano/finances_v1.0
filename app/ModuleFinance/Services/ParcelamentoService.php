<?php

namespace App\ModuleFinance;

use App\ModuleFinance\Repositories\ParcelamentoRepository;
use App\ModuleFinance\Entities\Parcelamento;

class ParcelamentoService {

    protected $repository;

    public function __construct(Parcelamento $model)
    {
        $this->repository   = new ParcelamentoRepository($model);

    }
}