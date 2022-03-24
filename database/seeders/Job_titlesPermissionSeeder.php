<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Job_titlesPermissionSeeder extends Seeder
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
                'name'        => 'Can view Jobs',
                'slug'        => 'view.jobs',
                'description' => 'Can view jobs',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Jobs',
                'slug'        => 'create.jobs',
                'description' => 'Can create new jobs',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Jobs',
                'slug'        => 'edit.jobs',
                'description' => 'Can edit jobs',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Jobs',
                'slug'        => 'delete.jobs',
                'description' => 'Can delete jobs',
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
