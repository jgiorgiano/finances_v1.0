<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ContaCorrenteSeeder::class);
        $this->call(FormaPagamentoSeeder::class);
        $this->call(GrupoFinanceiroSeeder::class);
        $this->call(SituacaoTableSeeder::class);        
    }
}
