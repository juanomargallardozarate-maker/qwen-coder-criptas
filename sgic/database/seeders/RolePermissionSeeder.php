<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions for each module
        $modules = [
            'usuarios' => ['ver', 'crear', 'editar', 'eliminar'],
            'roles' => ['ver', 'crear', 'editar', 'eliminar', 'asignar'],
            'cementerios' => ['ver', 'crear', 'editar', 'eliminar'],
            'contratos' => ['ver', 'crear', 'editar', 'eliminar', 'aprobar'],
            'clientes' => ['ver', 'crear', 'editar', 'eliminar'],
            'pagos' => ['ver', 'crear', 'editar', 'eliminar', 'aprobar'],
            'mantenimientos' => ['ver', 'crear', 'editar', 'eliminar'],
            'inventarios' => ['ver', 'crear', 'editar', 'eliminar'],
            'reportes' => ['ver', 'exportar'],
            'configuracion' => ['ver', 'editar'],
        ];

        // Create permissions
        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                Permission::firstOrCreate(['name' => "{$action}.{$module}"]);
            }
        }

        // Create roles and assign permissions
        // Administrador - Todos los permisos
        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $adminRole->givePermissionTo(Permission::all());

        // Gerente - La mayoría de permisos excepto configuración
        $managerRole = Role::firstOrCreate(['name' => 'Gerente']);
        $managerPermissions = Permission::whereNotIn('name', [
            'ver.configuracion',
            'editar.configuracion',
        ])->get();
        $managerRole->givePermissionTo($managerPermissions);

        // Asistente - Permisos básicos de lectura y creación
        $assistantRole = Role::firstOrCreate(['name' => 'Asistente']);
        $assistantPermissions = Permission::whereIn('name', [
            'ver.usuarios',
            'ver.cementerios',
            'ver.contratos',
            'crear.contratos',
            'editar.contratos',
            'ver.clientes',
            'crear.clientes',
            'editar.clientes',
            'ver.pagos',
            'crear.pagos',
            'ver.mantenimientos',
            'crear.mantenimientos',
            'ver.inventarios',
            'ver.reportes',
            'exportar.reportes',
        ])->get();
        $assistantRole->givePermissionTo($assistantPermissions);

        // Consulta - Solo lectura
        $viewerRole = Role::firstOrCreate(['name' => 'Consulta']);
        $viewerPermissions = Permission::where('name', 'like', 'ver.%')->get();
        $viewerRole->givePermissionTo($viewerPermissions);

        // Create admin user if not exists
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@sgic.com'],
            [
                'name' => 'Administrador del Sistema',
                'password' => bcrypt('admin123'),
                'email_verified_at' => now(),
            ]
        );
        $adminUser->assignRole($adminRole);

        // Create sample users for other roles
        $this->createUserWithRole('gerente@sgic.com', 'Gerente General', 'Gerente', 'gerente123');
        $this->createUserWithRole('asistente@sgic.com', 'Asistente Administrativo', 'Asistente', 'asistente123');
        $this->createUserWithRole('consulta@sgic.com', 'Usuario Consulta', 'Consulta', 'consulta123');
    }

    private function createUserWithRole(string $email, string $name, string $role, string $password): void
    {
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => bcrypt($password),
                'email_verified_at' => now(),
            ]
        );
        $user->assignRole($role);
    }
}
