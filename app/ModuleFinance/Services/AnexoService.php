<?php

namespace App\ModuleFinance\Services;

use App\ModuleFinance\Repositories\AnexoRepository;
use App\ModuleFinance\Entities\Anexo;

class AnexoService {

    protected $repository;

    public function __construct(Anexo $model)
    {
        $this->repository   = new AnexoRepository($model);

    }
}