<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FakeUserTableSeeder::class,
            TypeSeeder::class,
            TechnoSeeder::class,
            ProjectSeeder::class,
            ProjectTechnologyTableSeeder::class,
        ]);
    }
}
