<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(VisitSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(StorySeeder::class);
        $this->call(SlideSeeder::class);
        $this->call(PerformanceDataSeeder::class);
    }
}
