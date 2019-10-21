<?php

use Illuminate\Database\Seeder;

class QuantitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Quantity::create([
            'label'=>'100',
            'value'=>'100'
        ]);
        App\QuantityCategory::create([
            'quantity_id'=>'1',
            'category_id'=>'1'
        ]);
        App\Quantity::create([
            'label'=>'250',
            'value'=>'250'
        ]);
        App\QuantityCategory::create([
            'quantity_id'=>'2',
            'category_id'=>'1'
        ]);
        App\Quantity::create([
            'label'=>'500(Best Price)',
            'value'=>'500'
        ]);
        App\QuantityCategory::create([
            'quantity_id'=>'3',
            'category_id'=>'1'
        ]);
        App\QuantityCategory::create([
            'quantity_id'=>'1',
            'category_id'=>'3'
        ]);
        App\QuantityCategory::create([
            'quantity_id'=>'2',
            'category_id'=>'3'
        ]);
        App\QuantityCategory::create([
            'quantity_id'=>'3',
            'category_id'=>'3'
        ]);
       
    }
}
