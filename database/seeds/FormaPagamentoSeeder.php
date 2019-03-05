<?php

use Illuminate\Database\Seeder;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forma_pagamento')->insert(
            [
                'nome' => 'Dinheiro',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Cheque',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Boleto',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Cartao de Credito',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Cartao de Debito',                
                'group_id' => 0,
            ]
        );
    }
}
