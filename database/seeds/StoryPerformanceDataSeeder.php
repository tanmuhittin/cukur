<?php

use App\StoryPerformanceData;
use Illuminate\Database\Seeder;

class StoryPerformanceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StoryPerformanceData::class, 10)->create();
    }
}