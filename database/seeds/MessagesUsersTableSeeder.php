<?php

use Illuminate\Database\Seeder;

class MessagesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::find(1);

        for($i=1; $i<=5; $i++){
        	$user->messages()->attach($i, array('reading_date' => "2018-10-02 10:00:00"));
        }
    }
}
