<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([
            'name'=>'Rupinder Singh',
            'email'=>'cto@chhapai.in',
            'password'=> Hash::make('1234567')
        ]);
        App\User::create([
            'name'=>'Rajesh Batra',
            'email'=>'hi@chhapai.in',
            'password'=> Hash::make('1234567')
        ]);
        App\User::create([
            'name'=>'Mohinder',
            'email'=>'monu@chhapai.in',
            'password'=> Hash::make('1234567')
        ]);
    }
}
