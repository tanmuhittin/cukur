<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Slide;
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

$factory->define(\App\Models\Slide::class, function (Faker $faker) {
    return [
        'type' => $faker->sentence(),
        'media_url' => $faker->imageUrl(1080,1920),
        'title' => $faker->words(3, true),
        'content' => $faker->realText(),
        'action_button' => $faker->sentence(),
        'story_id' => random_int(1, 10)
    ];
});
