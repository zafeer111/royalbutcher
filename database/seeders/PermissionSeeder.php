<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            'admin',
            'customer',
            'buyer',
            'seller',
            'user_management'
        ];
        
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $rolePermissions = [
            'admin' => ['admin'],
            'customer' => ['customer'],
            'buyer'    => ['buyer'],
            'seller'   => ['seller'],
        ];
        
        foreach ($rolePermissions as $roleName => $perms) {
            $role = Role::where('name', $roleName)->first();

            if ($role) {
                $role->syncPermissions($perms);
            }
        }
            $role = Role::where('name', $roleName)->first();
            $role->syncPermissions($permissions);
    }
}
