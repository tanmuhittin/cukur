<?php

use App\SlidePerformanceData;
use Illuminate\Database\Seeder;

class SlidePerformanceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SlidePerformanceData::class, 10)->create();
    }
}