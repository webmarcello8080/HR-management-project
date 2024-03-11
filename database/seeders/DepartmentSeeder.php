<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // check if table users is empty
        if(DB::table('departments')->count() == 0){

            DB::table('departments')->insert([
                ['name' => 'Design'],
                ['name' => 'Project Manager'],
                ['name' => 'Development'],
                ['name' => 'Sales'],
                ['name' => 'Marketing'],

            ]);
            
        } else { echo "departments Table is not empty, therefore NOT "; }
    }
}
