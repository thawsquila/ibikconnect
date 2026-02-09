<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Database Seeder
 * 
 * Seeds the database with initial data for development and testing
 * Run with: php artisan db:seed
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CdcPartnerSeeder::class,
            CdcJobListingSeeder::class,
            CdcEventSeeder::class,
            CdcNewsSeeder::class,
            BeiEventSeeder::class,
            BeiEducationSeeder::class,
        ]);

        $this->command->info('✅ Database seeded successfully!');
    }
}
