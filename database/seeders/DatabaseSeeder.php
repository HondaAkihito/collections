<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            // CollectionSeeder::class,
            CollectionImageSeeder::class,
            // TechnologyTagSeeder::class,
            // FeatureTagSeeder::class,
        ]);

        // \App\Models\Collection::factory(10)->create();
        // \App\Models\CollectionImage::factory(30)->create();
    }
}
