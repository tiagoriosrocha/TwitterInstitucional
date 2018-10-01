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
        $this->call(EditorsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EditorsFollowersTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(MessagesUsersTableSeeder::class);
    }
}


