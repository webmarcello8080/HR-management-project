<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // check if table users is empty
        if(DB::table('locations')->count() == 0){

            DB::table('locations')->insert([
                ['name' => 'Bristol'],
                ['name' => 'London'],
                ['name' => 'Paris'],
                ['name' => 'Tokyo'],

            ]);
            
        } else { echo "locations Table is not empty, therefore NOT "; }
    }
}
