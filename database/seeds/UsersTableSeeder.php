<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $senha = bcrypt('secret');
        $data = now();

      /*   DB::table('users')->insert([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => $senha,
            'created_at' => $data
        ]);
 */
         for($i = 1; $i < 10; $i++){

            DB::table('users')->insert([
                'username' => 'User' . $i,
                'email' => 'teste'. $i . '@gmail.com',
                'password' => $senha,
                'created_at' => $data
            ]);
            
         }
    }
}
