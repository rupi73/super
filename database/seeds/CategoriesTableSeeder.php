<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Category::create([
            'name'=>'Business Cards',
            'is_size_price'=>0
        ]);
        App\Category::create([
            'name'=>'Brouchers'
            
        ]);
        App\Category::create([
            'name'=>'Letter Heads'
        ]);
        App\Category::create([
            'name'=>'Leaflets'
        ]);
    }
}
