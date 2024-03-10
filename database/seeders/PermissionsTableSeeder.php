<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'view_roles',
            'create_roles',
            'edit_roles',
            'delete_roles',
            'export_roles',
        ];
        $users = [
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
            'export_users',
        ];
        $students = [
            'view_students',
            'create_students',
            'edit_students',
            'delete_students',
            'export_students',
            'create_assistances',
            'view_assistances',
            'edit_assistances',
            'delete_assistances',
            'export_assistances',
        ];
        $teachers = [
            'view_teachers',
            'create_teachers',
            'edit_teachers',
            'delete_teachers',
            'export_teachers',
        ];
        $grades = [
            'view_grades',
            'create_grades',
            'edit_grades',
            'delete_grades',
            'export_grades',
        ];
        $courses = [
            'view_courses',
            'create_courses',
            'edit_courses',
            'delete_courses',
            'export_courses',
        ];
        $notifications = [
            'view_notifications',
            'create_notifications',
            'edit_notifications',
            'delete_notifications',
            'export_notifications',
        ];

        foreach ($users as $permission) {
            Permission::create(['name' => $permission, 'category' => 'users']);
        }
        foreach ($roles as $permission) {
            Permission::create(['name' => $permission, 'category' => 'roles']);
        }
        foreach ($students as $permission) {
            Permission::create(['name' => $permission, 'category' => 'students']);
        }
        foreach ($teachers as $permission) {
            Permission::create(['name' => $permission, 'category' => 'teachers']);
        }
        foreach ($grades as $permission) {
            Permission::create(['name' => $permission, 'category' => 'grades']);
        }
        foreach ($courses as $permission) {
            Permission::create(['name' => $permission, 'category' => 'courses']);
        }
        foreach ($notifications as $permission) {
            Permission::create(['name' => $permission, 'category' => 'notifications']);
        }
    }
}
