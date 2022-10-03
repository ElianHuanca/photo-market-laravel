<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evento = new Evento();
        $evento->fecha='15-10-2022';
        $evento->hora='17:00';
        $evento->lugar='Av/Brasil C/CaboQuiroga #50';
        $evento->idTipo=1;
        $evento->idUser=5;
        $evento->save();

        $evento = new Evento();
        $evento->fecha='20-10-2022';
        $evento->hora='19:00';
        $evento->lugar='C/Parabano #123';
        $evento->idTipo=3;
        $evento->idUser=5;
        $evento->save();
        
    }
}
