<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        

            DB::table('categoria')->insert(
                [
                    'nome' => 'Aluguel',                
                    'group_id' => 0,
                ],
                [
                    'nome' => 'Roupas',                
                    'group_id' => 0,
                ],
                [
                    'nome' => 'Restaurante',                
                    'group_id' => 0,
                ],
                [
                    'nome' => 'Eletricidade',                
                    'group_id' => 0,
                ],
                [
                    'nome' => 'Council Tax',                
                    'group_id' => 0,
                ]
            );
            
         
    }
}
