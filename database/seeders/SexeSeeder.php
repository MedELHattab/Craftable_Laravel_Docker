<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert "homme" gender
        DB::table('sexes')->insert([
            'name' => 'male',
        ]);

        // Insert "femme" gender
        DB::table('sexes')->insert([
            'name' => 'female',
        ]);
    }
}

