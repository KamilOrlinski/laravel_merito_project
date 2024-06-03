<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Dane dla admina

            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
            ],

            // Dane dla moda
            [
                'name' => 'Moderator',
                'username' => 'mod',
                'email' => 'mod@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'mod',
            ],

            // Dane dla użytkownika
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('321'),
                'role' => 'user',
            ],
        ]);
    }
}
