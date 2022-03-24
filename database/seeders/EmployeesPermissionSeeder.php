<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissionitems = [
            [
                'name'        => 'Puede Ver Empleados',
                'slug'        => 'ver.empleados',
                'description' => 'Puede Ver Empleados',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Puede Crear Empleados',
                'slug'        => 'crear.empleados',
                'description' => 'Puede Crear Empleados',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Puede Editar Empleados',
                'slug'        => 'editar.empleado',
                'description' => 'Puede Editar Empleados',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Puede Eliminar Empleados',
                'slug'        => 'eliminar.empleado',
                'description' => 'Puede Eliminar Empleados',
                'model'       => 'Permission',
            ],
        ];


        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }

        }








    }
}
