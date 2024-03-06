<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'dev@ricardoalvarez.com.co',
            'password' => bcrypt('12345678')
        ]);
        $role = Role::findByName('Super Admin');
        $user->assignRole($role);
    }
}
