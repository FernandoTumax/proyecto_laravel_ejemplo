<?php

namespace Database\Seeders;

use App\Campu;
use App\State;
use App\Town;
use Illuminate\Database\Seeder;

class CampuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campu::create([
            'code_campus' => '123456789',
            'name' => 'Sede de prueba',
            'state_id' => State::all()->random()->id,
            'town_id' => Town::all()->random()->id
        ]);
    }
}
