<?php

use Illuminate\Database\Seeder;
use App\User;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker\Factory::create();
    	$users = User::all()->pluck('id')->toArray();

        for($i=0; $i<15; $i++){
	        App\Message::create([
	            'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
	            'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
	            'editor_id' => $faker->randomElement($users),
	            'sent_date' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = '-1 years')->format('Y-m-d h:m:s'),
	        ]);
	    }
    }
}
