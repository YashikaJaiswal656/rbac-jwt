<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $managerRole = Role::where('slug', 'manager')->first();
        $employeeRole = Role::where('slug', 'employee')->first();

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('Admin@12345'),
                'is_active' => true,
            ]
        );
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        $manager = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'John Manager',
                'password' => Hash::make('Manager@12345'),
                'is_active' => true,
            ]
        );
        $manager->roles()->syncWithoutDetaching([$managerRole->id]);

        $employee = User::firstOrCreate(
            ['email' => 'employee@example.com'],
            [
                'name' => 'Jane Employee',
                'password' => Hash::make('Employee@12345'),
                'is_active' => true,
            ]
        );
        $employee->roles()->syncWithoutDetaching([$employeeRole->id]);
    }
}
