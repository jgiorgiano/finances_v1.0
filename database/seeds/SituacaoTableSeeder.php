<?php

use Illuminate\Database\Seeder;

class SituacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situacao')->insert(
            [
                'nome' => 'Em Aberto',                
            ],
            [
                'nome' => 'Pago',                
            ]         
        );
    }
}
