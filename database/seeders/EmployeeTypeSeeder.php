<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // check if table users is empty
        if(DB::table('employee_types')->count() == 0){

            DB::table('employee_types')->insert([
                ['name' => 'Director'],
                ['name' => 'Developer'],
                ['name' => 'Designer'],
                ['name' => 'SEO '],

            ]);
            
        } else { echo "employee_types Table is not empty, therefore NOT "; }
    }
}
