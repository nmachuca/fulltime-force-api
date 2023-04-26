<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(config('fulltime_force.is_secure')) {
            $default_user = [
                'name' => config('fulltime_force.default.name', 'default'),
                'email' => config('fulltime_force.default.email', 'default@fulltime-force.com'),
                'password' => Hash::make(config('fulltime_force.default.password', '8Z$f7!mftbS5S0E6ad3L')),
            ];
            DB::table('users')->insert($default_user);
        }
    }
}
