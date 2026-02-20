<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'View Users', 'slug' => 'view-users', 'description' => 'Can view user list', 'group' => 'users'],
            ['name' => 'Create Users', 'slug' => 'create-users', 'description' => 'Can create new users', 'group' => 'users'],
            ['name' => 'Update Users', 'slug' => 'update-users', 'description' => 'Can update user details', 'group' => 'users'],
            ['name' => 'Delete Users', 'slug' => 'delete-users', 'description' => 'Can delete users', 'group' => 'users'],
            ['name' => 'Assign Roles', 'slug' => 'assign-roles', 'description' => 'Can assign roles to users', 'group' => 'users'],

            ['name' => 'View Roles', 'slug' => 'view-roles', 'description' => 'Can view roles', 'group' => 'roles'],
            ['name' => 'Create Roles', 'slug' => 'create-roles', 'description' => 'Can create new roles', 'group' => 'roles'],
            ['name' => 'Update Roles', 'slug' => 'update-roles', 'description' => 'Can update roles', 'group' => 'roles'],
            ['name' => 'Delete Roles', 'slug' => 'delete-roles', 'description' => 'Can delete roles', 'group' => 'roles'],
            ['name' => 'Assign Permissions', 'slug' => 'assign-permissions', 'description' => 'Can assign permissions to roles', 'group' => 'roles'],

            ['name' => 'View Permissions', 'slug' => 'view-permissions', 'description' => 'Can view permissions', 'group' => 'permissions'],
            ['name' => 'Create Permissions', 'slug' => 'create-permissions', 'description' => 'Can create permissions', 'group' => 'permissions'],
            ['name' => 'Update Permissions', 'slug' => 'update-permissions', 'description' => 'Can update permissions', 'group' => 'permissions'],
            ['name' => 'Delete Permissions', 'slug' => 'delete-permissions', 'description' => 'Can delete permissions', 'group' => 'permissions'],

            ['name' => 'View Reports', 'slug' => 'view-reports', 'description' => 'Can view reports', 'group' => 'reports'],
            ['name' => 'Export Reports', 'slug' => 'export-reports', 'description' => 'Can export reports', 'group' => 'reports'],

            ['name' => 'Manage Settings', 'slug' => 'manage-settings', 'description' => 'Can manage system settings', 'group' => 'settings'],
            ['name' => 'View Settings', 'slug' => 'view-settings', 'description' => 'Can view system settings', 'group' => 'settings'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['slug' => $permission['slug']], $permission);
        }
    }
}
