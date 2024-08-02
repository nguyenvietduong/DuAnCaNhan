<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Booking',
            'email' => 'adphgmnhd@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin')
        ]);
    }
}
