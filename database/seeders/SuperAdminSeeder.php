<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the super admin user
        
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superAdmin@gmail.com',
            'password' => Hash::make('superAdmin')
        ]);

        // Create the super admin role
        $superAdminRole = Role::create(['name' => 'super admin']);


        // Retrieve all permissions and assign them to the super admin role
        $permissions = Permission::all();
        $superAdminRole->syncPermissions($permissions);
        
        // Assign the super admin role to the super admin user
        $superAdmin->assignRole($superAdminRole);
    }
}
