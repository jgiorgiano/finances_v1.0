<?php

namespace App\ModuleFinance\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LancamentoRepository extends Repository{

    /**
     * Retorna os detalhes para o lancamentos de uma conta(categoria, grupo Financeiro, forma pagamento e conta corrente)
     * 
     * @param group_id     * 
     * return Array
     */

    public function getAllDetails($id)
    {
        $categorias      =   DB::table('categoria')->where('group_id', $id)->get();
        $grupoFinanceiro =   DB::table('grupo_financeiro')->where('group_id', $id)->get();
        $formaPgto       =   DB::table('forma_pagamento')->where('group_id', $id)->get();
        $contaCorrente   =   DB::table('conta_corrente')->where('group_id', $id)->get();
        $group       =   DB::table('group')->where('id', $id)->first();

        return ['categorias' => $categorias, 'grupoFinanceiro' => $grupoFinanceiro, 'formaPgto' => $formaPgto, 'contaCorrente' =>  $contaCorrente, 'group' => $group];
    }

    public function novoLancamento($conta, $request)
    {
        //dd($request['categoria']);
        return DB::transaction(function ($conta) {
            $lancamento =  DB::table('lancamento')
            ->insert($conta);
               
               
                foreach ($request['parcela'] as $data) {                   

                    DB::table('parcelamento')
                    ->insert([
                            'conta_id'      => $lancamento->id,
                            'situacao_id'   => $request['situacao_id'],
                            'valor'         => $data['valor'],
                            'vencimento'    => $data['vencimento'],
                            'numero_parcial'=> $data['numero']
                    ]);
                }
             
        });


    }

}