<?php

namespace App\ModuleFinance\Services;

use App\ModuleFinance\Repositories\ParcelamentoRepository;
use App\ModuleFinance\Entities\Parcelamento;

class ParcelamentoService {

    protected $repository;

    public function __construct(Parcelamento $model)
    {
        $this->repository   = new ParcelamentoRepository($model);

    }

    public function store($request)
    {        
        try{

            $data = $this->repository->newParcelas($request->all(), $request->lancamento);

            return [
                'success' => true,
                'message' => "parcelas Adicionadas com sucesso",
                'data'  => $data
            ];
        }
        catch(Exception $e)
        {
            return [
                'success' => false,
                'message' => "Houve um erro",
                'data'  => null
            ];

        }

    }
}