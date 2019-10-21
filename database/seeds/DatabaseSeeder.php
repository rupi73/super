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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(GsmsTableSeeder::class);
        $this->call(QuantitiesTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(PapersTableSeeder::class);
        $this->call(TreatmentsTableSeeder::class);
    }
}
