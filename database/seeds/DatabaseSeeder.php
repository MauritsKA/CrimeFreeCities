<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
           'id' => 1,
           'label' => "default",
           'url' => "default.jpg",
       ]);


        DB::table('users')->insert([
           'id' => 1,
           'name' => "Maurits Korthals Altes",
           'email' => "maurits@blulocks.com",
           'password' => bcrypt('wachtwoord'),
       ]);

    }
}
