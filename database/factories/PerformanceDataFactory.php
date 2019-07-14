<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\PerformanceData::class, function (Faker $faker) {
    $probs = [0,0,0,0,0,1];
    return [
        'slide_id' => random_int(1,60),
        'visit_id' => random_int(1,10),
        'duration' => random_int(1,10),
        'success' => $probs[array_rand($probs)],
    ];
});
