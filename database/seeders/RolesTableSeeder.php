<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Student']);
        Role::create(['name' => 'Teacher']);
        Role::create(['name' => 'Parent']);
        Role::create(['name' => 'Secretary']);
        Role::create(['name' => 'Administrative']);
    }
}
