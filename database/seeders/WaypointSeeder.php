<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaypointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waypoints')->insert([
            'title'=> 'test',
            'short_description'=> 'test',
            'long_description'=> 'test',
            'latitude' => 1,
            'longitude' => 1,
            'index_of_route' => 0,
            'visited' => true
        ]);
    }
}
