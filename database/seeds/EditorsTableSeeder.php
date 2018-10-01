<?php

use Illuminate\Database\Seeder;

class EditorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Editor::create([
            'name' => 'Direção'
        ]);

        App\Editor::create([
            'name' => 'Ensino'
        ]);

        App\Editor::create([
            'name' => 'Assistência'
        ]);

        App\Editor::create([
            'name' => 'Napne'
        ]);

        App\Editor::create([
            'name' => 'Pesquisa'
        ]);

        App\Editor::create([
            'name' => 'Extensão'
        ]);
    }
}
