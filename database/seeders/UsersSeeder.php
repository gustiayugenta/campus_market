<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'number_phone' => '081234567890',
                'password' => Hash::make('Admin123'),
                'role' => 'Admin',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Gladys',
                'email' => 'gladys@gmail.com',
                'number_phone' => '082345678901',
                'password' => Hash::make('Gladys123'),
                'role' => 'Penjual',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Kaila',
                'email' => 'kaila@gmail.com',
                'number_phone' => '083456789012',
                'password' => Hash::make('Kaila123'),
                'role' => 'Penjual',
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Lulu',
                'email' => 'lulu@gmail.com',
                'number_phone' => '084567890123',
                'password' => Hash::make('Lulu123'),
                'role' => 'Penjual',
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Rara',
                'email' => 'rara@gmail.com',
                'number_phone' => '085678901234',
                'password' => Hash::make('Rara123'),
                'role' => 'Penjual',
                'created_at' => now(),
            ],
        ]);
    }
}