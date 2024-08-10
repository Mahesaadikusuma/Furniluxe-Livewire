<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Administrator']);
        $permission = Permission::create(['name' => 'manage tasks']);
        $permission->assignRole($adminRole);
        
        $adminUser = User::find(1);
        // $adminUser = User::factory()->create([
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('SecurePassword')
        // ]);
        $adminUser->assignRole('Administrator');
    }
}
