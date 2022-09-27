<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            [
                'name' => 'Admin',
                'phone_number' => '09123456789',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'),
                // 'type' => 'admin',
            ]
        ));
    }
}
