<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            //Me
            [
                'id' => '11',
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(12345678),
                'role' => 'admin',
            ],
            [
                'id' => '12',
                'name' => 'ken',
                'username' => 'ken',
                'email' => 'kensan@gmail.com',
                'password' => Hash::make(12345678),
                'role' => 'user',
            ],
            [
                'id' => '13',
                'name' => 'rin',
                'username' => 'rin',
                'email' => 'rin@gmail.com',
                'password' => Hash::make(12345678),
                'role' => 'admin',
            ],



        ]);
    }
}
