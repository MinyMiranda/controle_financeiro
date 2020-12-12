<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Nome Usuário',
            'email'     => 'user@email.com.br',
            'cpf'  => '456.253.210-75',
        ]);

        User::create([
            'name'      => 'Nome Usuário 2',
            'email'     => 'user2@email.com.br',
            'cpf'  => '586.254.369-95',
        ]);
    }
}
