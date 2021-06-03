<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            ContentSeeder::class,
            CoursePurchaseSeeder::class,
            UserDataSeeder::class,
            UserCollectionSeeder::class,
        ]);
    }
}
