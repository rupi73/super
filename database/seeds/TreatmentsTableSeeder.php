<?php

use Illuminate\Database\Seeder;

class TreatmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Treatment::create([
           'name'=>'Foiling',
           'slug'=>'foiling',
           'settings'=>'{"sides":"both","colors":"red,green,blue"}' 
        ]);
        App\Treatment::create([
            'name'=>'Electroplating',
            'slug'=>'electroplating',
            'settings'=>'{"sides":"both","colors":"red,green,blue"}' 
         ]);
         App\Treatment::create([
            'name'=>'LetterPress',
            'slug'=>'letterpress',
            'settings'=>'{"sides":"both","colors":"red,green,blue"}' 
         ]);
         App\Treatment::create([
            'name'=>'RaiseSpotGloss',
            'slug'=>'raisespotgloss',
            'settings'=>'{"sides":"both"}' 
         ]);
         App\Treatment::create([
            'name'=>'Embossing',
            'slug'=>'embossing',
            'settings'=>'{"sides":"single"}' 
         ]);

    }
}
