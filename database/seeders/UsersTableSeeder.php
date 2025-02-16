<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminUser!!'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Omar',
            'email' => 'Omar@example.com',
            'password' => Hash::make('Omar!!'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'ALi',
            'email' => 'ALi@example.com',
            'password' => Hash::make('Ali!!'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Ahmad',
            'email' => 'Ahmad@example.com',
            'password' => Hash::make('Ahmad!!'),
            'role' => 'user',
        ]);
    }
}
