<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Enums\SlideType;

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
        'type' => SlideType::Image,
        'media_url' => $faker->imageUrl(540,960),
        'title' => $faker->words(3, true),
        'content' => $faker->realText(),
        'action_button' => $faker->sentence(),
        'duration' => random_int(3,6),
        'story_id' => random_int(1, 10),
        'score' => 0,
        'order' => 0
    ];
});
