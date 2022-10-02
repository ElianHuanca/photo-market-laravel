<?php

namespace Database\Seeders;

use App\Models\TipoEvento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new TipoEvento();
        $tipo->nombre="Cumpleaños";
        $tipo->save();


        $tipo = new TipoEvento();
        $tipo->nombre="Quinceaños";
        $tipo->save();

        $tipo = new TipoEvento();
        $tipo->nombre="Matrimonio";
        $tipo->save();

        $tipo = new TipoEvento();
        $tipo->nombre="Bautizo";
        $tipo->save();

        $tipo = new TipoEvento();
        $tipo->nombre="Graduacion";
        $tipo->save();
    }
}
