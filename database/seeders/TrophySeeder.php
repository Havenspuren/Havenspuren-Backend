<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrophySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trophies')->insert([
            'waypoint_id' => 1,
            'x' => 0,
            'y' => 0,
            'name' => 'test',
            'description' => 'test',
            'path_to_image' => 'test',
        ]);
        
    }
}
