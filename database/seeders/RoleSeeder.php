<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      $role_admin = Role::create(['name' => 'admin']); //administrador
      $role_encar = Role::create(['name' => 'encargado']); //encargado
      $role_docen = Role::create(['name' => 'docente']); //codente
      
      /*$permission_create_role = Permission::create(['name' => 'create roles']);
      $permission_read_role = Permission::create(['name' => 'read roles']);
      $permission_update_role = Permission::create(['name' => 'update roles']);
      $permission_delete_role = Permission::create(['name' => 'delete roles']);*/

      $permission_create_user = Permission::create(['name' => 'create users']);
      $permission_read_user = Permission::create(['name' => 'read users']);
      $permission_update_user = Permission::create(['name' => 'update users']);
      $permission_delete_user = Permission::create(['name' => 'delete users']);

      $permission_create_categoria = Permission::create(['name' => 'create categorias']);
      $permission_read_categoria = Permission::create(['name' => 'read categorias']);
      $permission_update_categoria = Permission::create(['name' => 'update categorias']);
      $permission_delete_categoria = Permission::create(['name' => 'delete categorias']);

      $permission_create_laboratorio = Permission::create(['name' => 'create laboratorios']);
      $permission_read_laboratorio = Permission::create(['name' => 'read laboratorios']);
      $permission_update_laboratorio = Permission::create(['name' => 'update laboratorios']);
      $permission_delete_laboratorio = Permission::create(['name' => 'delete laboratorios']);

      $permission_create_equipo = Permission::create(['name' => 'create equipos']);
      $permission_read_equipo = Permission::create(['name' => 'read equipos']);
      $permission_update_equipo = Permission::create(['name' => 'update equipos']);
      $permission_delete_equipo = Permission::create(['name' => 'delete equipos']);

      $permission_create_categoria = Permission::create(['name' => 'create categorias']);
      $permission_read_categoria = Permission::create(['name' => 'read categorias']);
      $permission_update_categoria = Permission::create(['name' => 'update categorias']);
      $permission_delete_categoria = Permission::create(['name' => 'delete categorias']);

      $permission_create_docente = Permission::create(['name' => 'create docentes']);
      $permission_read_docente = Permission::create(['name' => 'read docentes']);
      $permission_update_docente = Permission::create(['name' => 'update docentes']);
      $permission_delete_docente = Permission::create(['name' => 'delete docentes']);

      $permission_create_ = Permission::create(['name' => 'create s']);
      $permission_read_ = Permission::create(['name' => 'read s']);
      $permission_update_ = Permission::create(['name' => 'update s']);
      $permission_delete_ = Permission::create(['name' => 'delete s']);
      
      $permissions_admin = [];
      $permissions_docente = [];
      $permissions_encargado = [];
      $role_admin->syncPermissions($permissions_admin);
      $role_docen->syncPermissions($permissions_docente);
      $role_encar->syncPermissions($permissions_encargado);

    }
}
