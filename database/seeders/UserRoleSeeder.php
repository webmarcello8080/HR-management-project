<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // check if table users is empty
        if(DB::table('users')->count() == 0){

            DB::table('users')->insert([
                [
                    'name' => 'Admin',
                    'email' => 'webmarcello8080+admin@gmail.com',
                    'password' => bcrypt('ciaoMarcello8080!'),
                ]
            ]);
            
        } else { echo "users Table is not empty, therefore NOT "; }

        // check if table users is empty
        if(DB::table('role_user')->count() == 0){

            DB::table('role_user')->insert([
                [
                    'user_id' => 1,
                    'role_id' => 1,
                ]
            ]);
            
        } else { echo "role_user Table is not empty, therefore NOT "; }
        
    }
}
