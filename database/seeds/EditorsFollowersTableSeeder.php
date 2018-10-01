<?php

use Illuminate\Database\Seeder;

class EditorsFollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $editor = App\Editor::find(1);
        $editor->followers()->attach(1);
        $editor->followers()->attach(2);
    }
}
