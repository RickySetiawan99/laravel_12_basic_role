<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(
            [ 'id' => 1],
            [       
                'name' => 'Developer',         
                'guard_name' => 'web'
            ]
        );

        Role::updateOrCreate(
            [ 'id' => 2],
            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ]
        );

        Role::updateOrCreate(
            [ 'id' => 3],
            [
                'name' => 'User',
                'guard_name' => 'web'
            ]
        );
    }
}
