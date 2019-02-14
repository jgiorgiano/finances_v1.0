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

    public function store($request, $user_id, $parcela_id)
    {
       $sum = 0; // total de pagamentos enviados pela request

        foreach($request['pgto'] as $pgto){
           $sum += $pgto['valor'];
        }            

        if($sum > $this->saldoParcela($parcela_id)){

            return session()->flash('message',
                ['success' => false,
                'message' => 'O valor registrado e maior que o valor da parcela']
            );

        }   
        
        $prepared = [];
        foreach($request['pgto'] as $pgto){
            array_push($prepared, [
                'conta_corrente_id'     => $pgto['contaCorrente'],
                'forma_pagamento_id'     => $pgto['formaPagamento'],
                'parcelamento_id'   => $parcela_id,
                'valor'     => $pgto['valor'],
                'user_id'   => $user_id,
                'created_at' => now(),
            ]);          
        }  

        session()->flash('message', 
            ['success' => true,
            'message' => 'Pagamento Registrado com Sucesso']
        );
        
        return $this->repository->insert($prepared);
    }


    public function show($group, $parcela)
    {

        $parcela = $this->repository->ParcelaAndLancamento($parcela);

        $options = $this->repository->details($group);

        return ['parcela' => $parcela, 'options' => $options];

    }

    public function saldoParcela($parcela_id)
    {
        $data =  $this->repository->saldoParcela($parcela_id);

        return $data->saldo_parcela;
    }


}