<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Size::create([
            'label'=>'88x55mm',
            'value'=>'88x55mm'
        ]);
        App\SizeCategory::create([
            'size_id'=>'1',
            'category_id'=>'1'
        ]);
        App\Size::create([
            'label'=>'65x65mm',
            'value'=>'65x65mm'
        ]);
        App\SizeCategory::create([
            'size_id'=>'2',
            'category_id'=>'1'
        ]);
        App\Size::create([
            'label'=>'A3',
            'value'=>'A3'
        ]);
        App\SizeCategory::create([
            'size_id'=>'3',
            'category_id'=>'3'
        ]);

    }
}
