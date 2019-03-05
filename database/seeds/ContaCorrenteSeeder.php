<?php

use Illuminate\Database\Seeder;

class ContaCorrenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conta_corrente')->insert(
            [
                'nome' => 'Carteira',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Banco 1',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Banco 2',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Cartao Credito 1',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Cartao Credito 2',                
                'group_id' => 0,
            ]
        );
    }
}
