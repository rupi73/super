<?php

use Illuminate\Database\Seeder;

class PapersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Paper::create([
            'name'=>'Matt Finish 320GSM',
            'slug'=>'matt-finish-320',
            'settings'=>"{'printing':'both'}",
            'gsm_id'=>1
            
            ]);
        App\Paper::create([
                'name'=>'Matt Finish 500GSM',
                'slug'=>'matt-finish-500',
                'settings'=>"{'printing':'both'}",
                'gsm_id'=>2
                
            ]);
        App\Paper::create([
                'name'=>'Matt Finish 600GSM',
                'slug'=>'matt-finish-600',
                'settings'=>"{'printing':'both'}",
                'gsm_id'=>3
                
            ]);
    }
}
