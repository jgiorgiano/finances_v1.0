<?php

namespace App\ModuleFinance\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ComposicaoRepository extends Repository{



    public function ParcelaAndLancamento($parcela)
    {
       return DB::table('parcelamento')
        ->select(
            'parcelamento.*',
            'lancamento.observacao as observacao_lancamento',
            'lancamento.nome',
            'lancamento.data_emissao',
            'lancamento.numero_documento',
            'categoria.nome as categoria',
            'grupo_financeiro.nome as grupo_financeiro'
        )
        ->where('parcelamento.id', $parcela)
        ->join('lancamento','lancamento.id' , '=','parcelamento.lancamento_id' )
        ->leftJoin('categoria', 'lancamento.categoria', '=', 'categoria.id')
        ->leftJoin('grupo_financeiro', 'lancamento.grupo_financeiro', '=', 'grupo_financeiro.id')
        ->first();
    }

    public function details($group_id)
    {

        $formaPgto = DB::table('forma_pagamento')->where('group_id', $group_id)->get();
        $contaCorrente = DB::table('conta_corrente')->where('group_id', $group_id)->get();

        return ['formaPagamento' => $formaPgto,'contaCorrente' => $contaCorrente];
    }

    public function insert($request)
    {
        DB::table('composicao_pagamento')->insert($request);
    }
}