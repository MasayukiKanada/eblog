<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'author',
                'email' => 'author@author.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/04/23 12:12:12',
            ],
        ]);
    }
}
