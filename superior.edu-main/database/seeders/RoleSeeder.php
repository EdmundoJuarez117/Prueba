<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */

    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Servicios escolares']);
        $role3 = Role::create(['name' => 'Docente']);
        $role4 = Role::create(['name' => 'Alumno']);

				// CASO OK:  Crear el permiso y lo agrega a UN rol
				// Permission::create(['name' => 'modalidades.index'])->assignRole($role1);

				// CASO OK:  Crear el permiso y lo agrega a MÄS DE UN rol (bd.role_has_permissions), el parámetro es un array de roles
        Permission::create(['name' => 'modalidades.index'])->syncRoles([$role1]);
				Permission::create(['name' => 'modalidades.create'])->syncRoles([$role1]);
				Permission::create(['name' => 'modalidades.edit'])->syncRoles([$role1]);
				Permission::create(['name' => 'modalidades.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'carreras.index'])->syncRoles([$role1]);
				Permission::create(['name' => 'carreras.create'])->syncRoles([$role1]);
				Permission::create(['name' => 'carreras.edit'])->syncRoles([$role1]);
				Permission::create(['name' => 'carreras.destroy'])->syncRoles([$role1]);
		Permission::create(['name' => 'planestudios.index'])->syncRoles([$role1]);
				Permission::create(['name' => 'planestudios.create'])->syncRoles([$role1]);
				Permission::create(['name' => 'planestudios.edit'])->syncRoles([$role1]);
				Permission::create(['name' => 'planestudios.destroy'])->syncRoles([$role1]);

		Permission::create(['name' => 'escalaevals.index'])->syncRoles([$role1]);
				Permission::create(['name' => 'escalaevals.create'])->syncRoles([$role1]);
				Permission::create(['name' => 'escalaevals.edit'])->syncRoles([$role1]);
				Permission::create(['name' => 'escalaevals.destroy'])->syncRoles([$role1]);
				/*
				// CASO OK NO: versión larga
				// Creamos los permisos
				Permission::create(['name' => 'modalidades.index']);  // 1
				Permission::create(['name' => 'modalidades.create']); // 2
				Permission::create(['name' => 'modalidades.edit']);   // 3
				Permission::create(['name' => 'modalidades.destroy']) // 4
				//Luego los asignamos
				$role1->permissions()->attach([1,2,3,4]);
				*/

    }

}
