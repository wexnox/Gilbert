<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Create Permissions
        $editRecipes = Permission::create(['name' => 'edit recipes']);
        $deleteRecipes = Permission::create(['name' => 'delete recipes']);
        $createRecipes = Permission::create(['name' => 'create recipes']);
        $viewRecipes = Permission::create(['name' => 'view recipes']);

        // Assign Permissions to Roles
        $adminRole->givePermissionTo([$editRecipes, $deleteRecipes, $createRecipes, $viewRecipes]);
        $userRole->givePermissionTo([$createRecipes, $viewRecipes]);

        // Optionally, assign a role to a user
        // $user = User::find(1); // Assuming a user with ID 1 exists
        // $user->assignRole($adminRole);
    }
}
