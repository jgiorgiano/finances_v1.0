<?php

use Illuminate\Database\Seeder;

class GrupoFinanceiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupo_financeiro')->insert(
            [
                'nome' => 'Despesas Fixas',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Despesas Variaveis',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Receitas Fixas',                
                'group_id' => 0,
            ],
            [
                'nome' => 'Receitas Variaveis',                
                'group_id' => 0,
            ],
            [
                'nome' => 'investimento',                
                'group_id' => 0,
            ]
        );
    }
}
