<?php

use App\Models\PerformanceData;
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
        factory(PerformanceData::class, 500)->create();
    }
}
