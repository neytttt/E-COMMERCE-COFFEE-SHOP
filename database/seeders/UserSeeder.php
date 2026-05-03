<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@graceandground.com',
                'password' => Hash::make('admin123'),
                'phone' => '+63 123 456 7890',
                'role' => 'super_admin',
                'is_active' => true,
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@graceandground.com',
                'password' => Hash::make('manager123'),
                'phone' => '+63 123 456 7891',
                'role' => 'manager',
                'is_active' => true,
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@graceandground.com',
                'password' => Hash::make('staff123'),
                'phone' => '+63 123 456 7892',
                'role' => 'staff',
                'is_active' => true,
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+63 123 456 7893',
                'role' => 'customer',
                'is_active' => true,
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}