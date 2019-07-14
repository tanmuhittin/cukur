<?php

use App\PerformanceData;
use Illuminate\Database\Seeder;

class PerformanceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\PerformanceData::class, 500)->create();
    }
}
