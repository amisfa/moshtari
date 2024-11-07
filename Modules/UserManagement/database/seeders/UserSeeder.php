<?php

namespace Modules\UserManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\UserManagement\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'user_name' => 'adminstrator',
            'email' => 'adminstrator@gmail.com',
            'password' => Hash::make('123456'),
            'activated_at' => now()
        ])->assignRole('admin');

        User::create([
            'user_name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
            'activated_at' => now()
        ])->assignRole('user');
    }
}
