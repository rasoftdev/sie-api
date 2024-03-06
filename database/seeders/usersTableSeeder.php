<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class usersTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Ricardo Alvarez',
            'email' => 'dev@ricardoalvarez.com.co',
            'password' => bcrypt('12345678')
        ]);
        $role = Role::findByName('Super Admin');
        $user->assignRole($role);
    }
}
