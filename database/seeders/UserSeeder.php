<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Admin',
            'lastname' => 'Admin',
            'identification' => '000000',
            'email' => 'admin@amate.co',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Wendy',
            'lastname' => 'Silva',
            'identification' => '000000',
            'email' => 'Wendy@violentometro.co',
            'password' => bcrypt('12345678'),
        ])->assignRole('Usuario');

        User::create([
            'name' => 'James',
            'lastname' => 'JJJ',
            'identification' => '000000',
            'email' => 'correo@mail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Psicologo');

        /************************************** */
        /* Question::create([
            'ask' => 'Te amenaza de muerte',
        ]);
        Question::create([
            'ask' => 'Te fuerza a tener relaciones',
        ]);
        Question::create([
            'ask' => 'Te golpea o agrede
            físicamente',
        ]); */
    }
}
