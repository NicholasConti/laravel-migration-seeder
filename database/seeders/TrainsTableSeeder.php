<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newTrain = new Train();
            $newTrain->company = $faker->randomElement(['Italo', 'TrenItalia', 'FrecciaRossa']);
            $newTrain->station_departure = $faker->city();
            $newTrain->station_arrival = $faker->city();
            $newTrain->departure_time = $faker->dateTimeInInterval('-1 week', '+6 months');
            $newTrain->arrival_time = $faker->dateTimeInInterval('-1 week', '+6 months');
            $newTrain->train_code = $faker->bothify('??###');
            $newTrain->n_wagons = $faker->numberBetween(1, 20);
            $newTrain->in_time = $faker->numberBetween(0, 1);
            $newTrain->cancelled =  $faker->numberBetween(0, 1);
            $newTrain->save();
        }
    }
}
