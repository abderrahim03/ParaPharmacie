<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // user Permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        // product Permissions
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'show products']);
        Permission::create(['name' => 'show product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);

        // category Permissions
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'show categories']);
        Permission::create(['name' => 'show category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);

        // order Permissions
        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'show orders']);
        Permission::create(['name' => 'show order']);
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'delete order']);

        // item Permissions
        Permission::create(['name' => 'create item']);
        Permission::create(['name' => 'show items']);
        Permission::create(['name' => 'show item']);
        Permission::create(['name' => 'edit item']);
        Permission::create(['name' => 'delete item']);

        // review Permissions
        Permission::create(['name' => 'create review']);
        Permission::create(['name' => 'show reviews']);
        Permission::create(['name' => 'show review']);
        Permission::create(['name' => 'edit review']);
        Permission::create(['name' => 'delete review']);

        // cart Permissions
        Permission::create(['name' => 'create cart']);
        Permission::create(['name' => 'show carts']);
        Permission::create(['name' => 'show cart']);
        Permission::create(['name' => 'edit cart']);
        Permission::create(['name' => 'delete cart']);
    }
}
