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
    public function run(): void
    {
         // create permissions
         Permission::create(['name' => 'create news']);
         Permission::create(['name' => 'edit news']);

          // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('create news');

        $role2 = Role::create(['name' => 'editor']);
        $role2->givePermissionTo('edit news');

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'User Writer',
            'email' => 'writer@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'User Editor',
            'email' => 'editor@example.com',
        ]);
        $user->assignRole($role2);
    }
}
