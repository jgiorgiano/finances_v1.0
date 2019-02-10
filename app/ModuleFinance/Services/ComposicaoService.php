<?php

namespace App\ModuleFinance\Services;

use App\ModuleFinance\Repositories\ComposicaoRepository;
use App\ModuleFinance\Entities\Composicao;

class ComposicaoService {

    protected $repository;

    public function __construct(Composicao $model)
    {
        $this->repository   = new ComposicaoRepository($model);

    }

    public function store($request, $user_id, $lancamento_id)
    {
        
        $prepared = [];
        foreach($request['pgto'] as $pgto){
            array_push($prepared, [
                'conta_corrente_id'     => $pgto['contaCorrente'],
                'forma_pagamento_id'     => $pgto['formaPagamento'],
                'parcelamento_id'   => $lancamento_id,
                'valor'     => $pgto['valor'],
                'user_id'   => $user_id,
                'created_at' => now(),
            ]);          
        }  

        return $this->repository->insert($prepared);
    }


    public function show($group, $parcela)
    {

        $parcela = $this->repository->ParcelaAndLancamento($parcela);

        $options = $this->repository->details($group);

        return ['parcela' => $parcela, 'options' => $options];

    }


}