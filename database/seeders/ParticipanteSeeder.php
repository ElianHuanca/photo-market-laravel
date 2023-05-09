<?php

namespace Database\Seeders;

use App\Models\Participante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participante = new Participante();
        $participante->idUser=1;
        $participante->idEvento=1;
        $participante->save();

        $participante = new Participante();
        $participante->idUser=2;
        $participante->idEvento=1;
        $participante->save();

        $participante = new Participante();
        $participante->idUser=3;
        $participante->idEvento=1;
        $participante->save();       

        $participante = new Participante();
        $participante->idUser=4;
        $participante->idEvento=1;
        $participante->save();

        $participante = new Participante();
        $participante->idUser=1;
        $participante->idEvento=2;
        $participante->save();

        $participante = new Participante();
        $participante->idUser=3;
        $participante->idEvento=2;
        $participante->save();
        
    }
}