<?php

namespace App\ModuleFinance\Repositories;


use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ParcelamentoRepository extends Repository{


    public function newParcelas($request, $lancamento_id)
    {
        $parcelas = [];
        foreach ($request['parcela'] as $data) {  
            array_push( $parcelas, [
                'lancamento_id'     => $lancamento_id,
                'valor'             => $data['valor'],
                'vencimento'        => $data['vencimento'],
                'numero_parcial'    => $data['numero'],
                'observacao'        => $data['observacao'],
            ]);
        } 
            
        DB::table('parcelamento')
        ->insert($parcelas);
    }
    
}