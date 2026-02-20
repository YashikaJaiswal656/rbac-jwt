<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::firstOrCreate(
            ['slug' => 'admin'],
            ['name' => 'Administrator', 'description' => 'Full system access']
        );

        $manager = Role::firstOrCreate(
            ['slug' => 'manager'],
            ['name' => 'Manager', 'description' => 'Manage users and view reports']
        );

        $employee = Role::firstOrCreate(
            ['slug' => 'employee'],
            ['name' => 'Employee', 'description' => 'Basic access']
        );

        $allPermissions = Permission::all();
        $admin->syncPermissions($allPermissions->pluck('id')->toArray());

        $managerPermissions = Permission::whereIn('slug', [
            'view-users',
            'create-users',
            'update-users',
            'assign-roles',
            'view-roles',
            'view-permissions',
            'view-reports',
            'export-reports',
            'view-settings',
        ])->pluck('id')->toArray();

        $manager->syncPermissions($managerPermissions);

        $employeePermissions = Permission::whereIn('slug', [
            'view-reports',
            'view-settings',
        ])->pluck('id')->toArray();

        $employee->syncPermissions($employeePermissions);
    }
}
