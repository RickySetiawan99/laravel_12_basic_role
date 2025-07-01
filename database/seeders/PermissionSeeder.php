<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::updateOrCreate(
            ['name'          => 'dashboard-list'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'users-read'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'roles-read'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'roles-create'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'roles-update'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'roles-delete'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'roles-restore'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'permissions-read'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'permissions-create'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'permissions-update'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'permissions-delete'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'permissions-restore'],
            [
            'guard_name'    => 'web',
        ]);

        Permission::updateOrCreate(
            ['name'          => 'users-create'],
            [
            'guard_name'    => 'web',
        ]);
        Permission::updateOrCreate(
            ['name'          => 'users-update'],
            [
            'guard_name'    => 'web',
        ]);
        Permission::updateOrCreate(
            ['name'          => 'users-delete'],
            [
            'guard_name'    => 'web',
        ]);
        Permission::updateOrCreate(
            ['name'          => 'users-restore'],
            [
            'guard_name'    => 'web',
        ]);
        Permission::updateOrCreate(
            ['name'          => 'users-force-delete'],
            [
            'guard_name'    => 'web',
        ]);
    }
}
