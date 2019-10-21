<?php

use Illuminate\Database\Seeder;

class GsmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         App\Gsm::create([
            'label'=>'320gsm',
            'value'=>'320'
        ]);
        App\Gsm::create([
            'label'=>'500gsm',
            'value'=>'500'
            
        ]);
        App\Gsm::create([
            'label'=>'600gsm',
            'value'=>'600'
        ]);
        
    }
}
