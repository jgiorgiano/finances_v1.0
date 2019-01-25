<?php

namespace App\ModuleFinance\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LancamentoRepository extends Repository{

    /**
     * Retorna os detalhes para o lancamentos de uma conta(categoria, grupo Financeiro, forma pagamento e conta corrente)     * 
     * @param group_id     * 
     * return Array
     */
    public function getAllDetails($id)
    {
        $categorias      =   DB::table('categoria')->where('group_id', $id)->get();
        $grupoFinanceiro =   DB::table('grupo_financeiro')->where('group_id', $id)->get();
        $formaPgto       =   DB::table('forma_pagamento')->where('group_id', $id)->get();
        $contaCorrente   =   DB::table('conta_corrente')->where('group_id', $id)->get();
        $group           =   DB::table('group')->where('id', $id)->first();

        return ['categorias' => $categorias, 'grupoFinanceiro' => $grupoFinanceiro, 'formaPgto' => $formaPgto, 'contaCorrente' =>  $contaCorrente, 'group' => $group];
    }

    /**
     * Persist data in the lancamento Table and insert their payments in the parcelas Table 
     */
    public function newMoviment($request)
    {
        
        $lancamento =  DB::table('lancamento')
        ->insertGetId([
            'categoria'          => $request['categoria'],
            'grupo_financeiro'   => $request['grupoFinanceiro'],
            'group'              => $request['group_id'],               
            'nome'               => $request['nome'],
            'tipo'               => $request['tipo'],
            'data_emissao'       => $request['dataEmissao'],
            'numero_documento'   => $request['numeroDocumento'],
            'observacao'         => $request['observacao'],
            'created_at'         => date("Y-m-d H:i:s"),
        ]);        
           
        $parcelas = [];
        foreach ($request['parcela'] as $data) {  
            array_push( $parcelas, [
                'lancamento_id'     => $lancamento,
                'valor'             => $data['valor'],
                'vencimento'        => $data['vencimento'],
                'numero_parcial'    => $data['numero'],
                'observacao'        => $data['observacao'],
            ]);
        } 
            
        DB::table('parcelamento')
        ->insert($parcelas);
    }

    public function getAllMovimentsByType($group_id, $type)
    {
        return DB::table('lancamento')
                ->select(
                    'lancamento.id',
                    'lancamento.nome',
                    'lancamento.data_emissao',
                    'lancamento.observacao',
                    'lancamento.created_at',
                    'categoria.nome as categoria',
                    'grupo_financeiro.nome as grupo_financeiro',
                    'parcelamento.valor',
                    'parcelamento.vencimento',
                    'parcelamento.numero_parcial',
                    'parcelamento.observacao as obsParcela',
                    'anexo.path' 
                )
                ->where([
                    ['group',   '=', $group_id],
                    ['tipo',    '=', $type]    
                ])
                ->leftJoin('parcelamento', 'lancamento.id', '=', 'parcelamento.lancamento_id')
                ->leftjoin('anexo', 'lancamento.id', '=', 'anexo.lancamento_id')
                ->join('categoria', 'lancamento.categoria', '=', 'categoria.id')
                ->join('grupo_financeiro', 'lancamento.grupo_financeiro', '=', 'grupo_financeiro.id')                
                ->orderBy('parcelamento.vencimento', 'asc')
                ->get();
    }
    
}