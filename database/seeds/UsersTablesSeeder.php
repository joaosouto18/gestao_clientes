<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'    => 'Teste',
            'email'    => 'usuario@teste.com.br',
            'password'   =>  Hash::make('123456'),
        ]);
    }
}
