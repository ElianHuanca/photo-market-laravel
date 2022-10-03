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
        $tipo= new TipoEvento();
        $tipo->tipo='Cumpleaños';
        $tipo->save();

        $tipo= new TipoEvento();
        $tipo->tipo='Boda';
        $tipo->save();

        $tipo= new TipoEvento();
        $tipo->tipo='Quinceaños';
        $tipo->save();

        $tipo= new TipoEvento();
        $tipo->tipo='Bautizo';
        $tipo->save();

        $tipo= new TipoEvento();
        $tipo->tipo='Graduacion';
        $tipo->save();

        $tipo= new TipoEvento();
        $tipo->tipo='Aniversario';
        $tipo->save();

        $tipo= new TipoEvento();
        $tipo->tipo='Fiestas Patrias';
        $tipo->save();

    }
}
