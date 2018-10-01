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
        App\User::create([
            'name' => 'Tiago',
            'email' => 'tiago.rios@ibiruba.ifrs.edu.br',
            'password' => bcrypt('tiago'),
        ]);

        App\User::create([
            'name' => 'Maria',
            'email' => 'maria.ifrs@ibiruba.ifrs.edu.br',
            'password' => bcrypt('maria'),
        ]);
    }
}
