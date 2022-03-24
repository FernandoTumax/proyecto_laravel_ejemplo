<?php

namespace Database\Seeders;

use Illuminate\Contracts\Queue\Job;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            $this->call(EmployeesPermissionSeeder::class);
            $this->call(Job_titlesPermissionSeeder::class);
            $this->call(PermissionsTableSeeder::class);
            $this->call(PermissionsCampusTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(ConnectRelationshipsSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(StateSeeder::class);
            $this->call(TownSeeder::class);
            $this->call(CampuSeeder::class);


        Model::reguard();
    }
}
