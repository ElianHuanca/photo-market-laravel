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
        $evento->titulo='Cumpleaños De Mary';
        $evento->descripcion='Estas invitado!!! ven y acompañame a celebrar mis 47años, no faltes te esperamos :D';
        $evento->fecha='2023-10-15';
        $evento->hora='17:00';
        $evento->lugar='Av/Brasil C/CaboQuiroga #50';
        $evento->idUser=5;
        $evento->save();

        $evento = new Evento();
        $evento->titulo='Boda De Hugo Y Angela';
        $evento->descripcion='Estas invitado!!! ven y acompañame a celebrar nuestra boda, no faltes te esperamos :D';
        $evento->fecha='2023-10-20';
        $evento->hora='19:00';
        $evento->lugar='C/Parabano #123';
        $evento->idUser=5;
        $evento->save();
        
    }
}
