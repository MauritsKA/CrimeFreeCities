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
           'name' => "Harm Jan Korthals Altes",
           'email' => "harmjan@crimefreecities.com",
           'password' => "\$2y\$10\$qJnePsdRscM1A9.Nu4YzP..vEstulwzNDLJMdFi6MbFHppRdyHSv6",
       ]);

    }
}
