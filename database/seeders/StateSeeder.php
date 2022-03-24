<?php

namespace Database\Seeders;

use App\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            "Alta Verapaz", 
            "Baja Verapaz", 
            "Chimaltenango",
            "Chiquimula",
            "El Progreso", 
            "Escuintla", 
            "Guatemala", 
            "Huehuetenango", 
            "Izabal", 
            "Jalapa", 
            "Jutiapa", 
            "Petén", 
            "Quetzaltenango", 
            "Quiché", 
            "Retalhuleu", 
            "Sacatepéquez", 
            "San Marcos", 
            "Santa Rosa", 
            "Sololá", 
            "Suchitepéquez", 
            "Totonicapán", 
            "Zacapa"
        ];

        foreach ($states as $state) {
            State::create([
                'name' => $state
            ]);
        }
    }
}
