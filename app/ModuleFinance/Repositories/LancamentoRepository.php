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
        $categorias =   DB::table('categoria')->where('group_id', $id)->get();
        $grupo =        DB::table('grupo_financeiro')->where('group_id', $id)->get();
        $formaPgto =     DB::table('forma_pagamento')->where('group_id', $id)->get();
        $contaCorrente= DB::table('conta_corrente')->where('group_id', $id)->get();

        return ['categorias' => $categorias, 'grupos' => $grupo, 'formaPgto' => $formaPgto, 'contaCorrente' =>  $contaCorrente];
    }

    public function novoLancamento($request)
    {
        return DB::transaction(function () {
           $lancamento =  DB::table('lancamento')
           ->insert([
               'categoria'       => $request['categoria_id'],
               'grupo_financeiro'   => $request['centro_custo_id'],
               'group'           => $request['group_id'],               
               'nome'               => $request['nome'],
               'tipo'               => $request['tipo'],
               'data_emissao'       => $request['data_emissao'],
               'numero_documento'   => $request['numero_documento'],
               'created_at'         => $request['created_at'],
           ]);

           DB::table('parcelamento')
           ->insert([


           ]);



        });


    }

}