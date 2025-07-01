<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developer = User::updateOrCreate(
            ['email' => 'developer@mail.com'],
            [
            'name' => 'Developer',
            'password'  => bcrypt('admin123'),
            'is_active' => 1,
        ]);
        $roleDeveloper = Role::findById(1);
        $developer->assignRole($roleDeveloper);

        $admin = User::updateOrCreate(
            ['email' => 'admin@mail.com'],
            [
            'name' => 'Admin',            
            'password'  => bcrypt('admin123')
        ]);
        $roleAdmin = Role::findById(2);
        $admin->assignRole($roleAdmin);
        
        $user = User::updateOrCreate(
            ['email' => 'user@mail.com'],
            [
            'name' => 'User',            
            'password'  => bcrypt('admin123')
        ]);
        $roleUser = Role::findById(3);
        $user->assignRole($roleUser);
    }
}
