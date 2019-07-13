<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\StoryPerformanceData;
use Illuminate\Support\Str;
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

$factory->define(StoryPerformanceData::class, function (Faker $faker) {
    return [
        'story_id' => random_int(1, 10),
        'visit_id' => random_int(1, 10),
        'clicked_position' => $faker->sentence(),
        'clicked_at' => $faker->dateTimeBetween('-30 years', 'now'),
        'loaded_at' => $faker->dateTimeBetween('-30 years', 'now'),
        'leaved_at' => $faker->dateTimeBetween('-30 years', 'now'),
        'added_to_cart_at' => $faker->dateTimeBetween('-30 years', 'now')
    ];
});
