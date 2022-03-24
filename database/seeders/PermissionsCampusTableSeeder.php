<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsCampusTableSeeder extends Seeder
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
                'name' => 'Can View Campus',
                'slug' => 'view.campus',
                'description' => 'Can view campus',
                'model' => 'Permission',
            ],
            [
                'name' => 'Can Create Campus',
                'slug' => 'create.campus',
                'description' => 'Can create new campus',
                'model' => 'Permission'
            ],
            [
                'name' => 'Can Edit Campus',
                'slug' => 'edit.campus',
                'description' => 'Can edit campus',
                'model' => 'Permission'
            ],
            [
                'name' => 'Can Delete Campus',
                'slug' => 'delete.campus',
                'description' => 'Can delete campus',
                'model' => 'Permission'
            ]
        ];

        /*
            Agregar los Permisos para los campus
        */

        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if($newPermissionitem === null){
                $newPermissionitem = config('roles.models.permission')::create([
                    'name' => $Permissionitem['name'],
                    'slug' => $Permissionitem['slug'],
                    'description' => $Permissionitem['description'],
                    'model' => $Permissionitem['model']
                ]);
            }
        }

    }
}
