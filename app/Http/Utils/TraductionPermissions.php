<?php

namespace App\Http\Utils;

class TraductionPermissions
{
    public static function getTranslatedPermissions($permission)
    {
        $roles = [
            'view_roles' => 'ver roles',
            'create_roles' => 'crear roles',
            'edit_roles' => 'editar roles',
            'delete_roles' => 'eliminar roles',
            'export_roles' => 'exportar roles',
            'view_users' => 'ver usuarios',
            'create_users' => 'crear usuarios',
            'edit_users' => 'editar usuarios',
            'delete_users' => 'eliminar usuarios',
            'export_users' => 'exportar usuarios',
            'view_students' => 'ver estudiantes',
            'create_students' => 'crear estudiantes',
            'edit_students' => 'editar estudiantes',
            'delete_students' => 'eliminar estudiantes',
            'export_students' => 'exportar estudiantes',
            'create_assistances' => 'crear asistencias',
            'view_assistances' => 'ver asistencias',
            'edit_assistances' => 'editar asistencias',
            'delete_assistances' => 'eliminar asistencias',
            'export_assistances' => 'exportar asistencias',
            'view_teachers' => 'ver profesores',
            'create_teachers' => 'crear profesores',
            'edit_teachers' => 'editar profesores',
            'delete_teachers' => 'eliminar profesores',
            'export_teachers' => 'exportar profesores',
            'view_grades' => 'ver grados',
            'create_grades' => 'crear grados',
            'edit_grades' => 'editar grados',
            'delete_grades' => 'eliminar grados',
            'export_grades' => 'exportar grados',
            'view_courses' => 'ver cursos',
            'create_courses' => 'crear cursos',
            'edit_courses' => 'editar cursos',
            'delete_courses' => 'eliminar cursos',
            'export_courses' => 'exportar cursos',
            'view_notifications' => 'ver notificaciones',
            'create_notifications' => 'crear notificaciones',
            'edit_notifications' => 'editar notificaciones',
            'delete_notifications' => 'eliminar notificaciones',
            'export_notifications' => 'exportar notificaciones',
        ];
        return $roles[$permission];
    }

    public static function getTranslatedModules($module)
    {
        $modules = [
            'roles' => 'roles',
            'users' => 'usuarios',
            'students' => 'estudiantes',
            'teachers' => 'profesores',
            'grades' => 'grados',
            'courses' => 'cursos',
            'notifications' => 'notificaciones',
        ];
        return $modules[$module];
    }
}
