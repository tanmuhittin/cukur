<?php

namespace Tests\Feature;

use App\Models\Story;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoryFetchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFetchingStory()
    {
        $story_id = Story::inRandomOrder()->first()->id;
        $response = $this->json('GET','/api/stories/'.$story_id);
        $response->assertOk();

        $fetched_story = $response->decodeResponseJson();
        $this->assertEquals($story_id, $fetched_story['data']['id']);
    }
}
