<?php

namespace Database\Seeders;

use App\Models\UserHasRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $number = range(1,17);
        $role            = Role::find(1);
        $role->syncPermissions($number);

        UserHasRole::create(['user_id' => 1, 'role_id' => 1]);
        UserHasRole::create(['user_id' => 2, 'role_id' => 2]);
        UserHasRole::create(['user_id' => 3, 'role_id' => 3]);
    }
}
