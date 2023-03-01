<?php

namespace Database\Seeders;

use App\Models\Permisson;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            ['name' => 'super-admin', 'display_name' => 'Super admin', 'ground' => 'system'],
            ['name' => 'admin', 'display_name' => 'Admin', 'ground' => 'system'],
            ['name' => 'employee', 'display_name' => 'employee', 'ground' => 'system'],
            ['name' => 'manager', 'display_name' => 'manager', 'ground' => 'system'],
            ['name' => 'user', 'display_name' => 'user', 'ground' => 'system'],
        ];
        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }

        $superuser = User::whereEmail('truongthanh6586@gmail.com')->first();
        if (!$superuser) {
            $superuser = User::factory()->create(['email' => 'truongthanh6586@gmail.com']);
        }
        $superuser->assignRole('super-admin');

        $permmissons = [

            ['name' => 'create-user', 'display_name' => 'Create User', 'ground' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update User', 'ground' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show User', 'ground' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete User', 'ground' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create Role', 'ground' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update Role', 'ground' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show Role', 'ground' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete Role', 'ground' => 'Role'],

        ];
        foreach ($permmissons as $item) {
            Permisson::updateOrCreate($item);
        }
    }
}
