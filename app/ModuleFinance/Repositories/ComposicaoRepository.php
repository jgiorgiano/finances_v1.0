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
            'grupo_financeiro.nome as grupo_financeiro',
            DB::raw('SUM(composicao_pagamento.valor) as total_pago')
        )
        ->where('parcelamento.id', $parcela)
        ->leftjoin('lancamento','lancamento.id' , '=','parcelamento.lancamento_id' )
        ->leftjoin('composicao_pagamento' , 'composicao_pagamento.parcelamento_id', '=', 'parcelamento.id')
        ->leftJoin('categoria', 'lancamento.categoria', '=', 'categoria.id')
        ->leftJoin('grupo_financeiro', 'lancamento.grupo_financeiro', '=', 'grupo_financeiro.id')
        ->groupBy('parcelamento.id')
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

    public function SaldoParcela($parcela_id)
    {
       return DB::table('parcelamento')
        ->select(
            /* 'parcelamento.valor',
            DB::raw('SUM(composicao_pagamento.valor) as total_pago'), */
            DB::raw('parcelamento.valor - SUM(composicao_pagamento.valor) as saldo_parcela')            
        )
        ->where('parcelamento.id', $parcela_id)
        ->leftJoin('composicao_pagamento', 'composicao_pagamento.parcelamento_id', '=', 'parcelamento.id')
        ->groupby('parcelamento.id')
        ->first();
    }

}