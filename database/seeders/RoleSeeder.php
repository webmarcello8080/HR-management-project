<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // check if table users is empty
        if(DB::table('roles')->count() == 0){

            DB::table('roles')->insert([
                ['name' => 'Admin'],
                ['name' => 'Employee'],
            ]);
            
        } else { echo "roles Table is not empty, therefore NOT "; }
    }
}
