<?php

namespace Tests\Feature;

use App\Jobs\CalculateSlideScore;
use App\Models\Slide;
use App\Models\Story;
use App\Models\Visit;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerformanceDataTest extends TestCase
{
    /**
     * A test for data submits
     * @throws \Exception
     */
    public function testDataSubmit()
    {
        $faker = Faker::create();
        $story = Story::has('slides')->inRandomOrder()->first();
        $slides = $story->slides;
        $visitor_uuid = $faker->uuid;
        $this->json('POST', 'api/performance-data',
            [
                'uuid' => $visitor_uuid,
                'slide_id' => $slides[0]->id,
                'duration' => random_int(1, 10),
                'success' => 0
            ])->assertOk();


        // verify job is created
        $this->expectsJobs(CalculateSlideScore::class);

        // verify visit uuid is saved
        $this->assertDatabaseHas('visits', [
            'uuid' => $visitor_uuid
        ]);

        //verify no error when the same uuid is submitted
        $this->json('POST', 'api/performance-data',
            [
                'uuid' => $visitor_uuid,
                'slide_id' => $slides[1]->id,
                'duration' => random_int(1, 10),
                'success' => 1
            ])->assertOk();


    }
}
