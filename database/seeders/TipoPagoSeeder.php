<?php

namespace Database\Seeders;

use App\Models\TipoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new TipoPago();
        $tipo->nombre="Efectivo";
        $tipo->save();

        $tipo = new TipoPago();
        $tipo->nombre="QR";
        $tipo->save();

        $tipo = new TipoPago();
        $tipo->nombre="Tarjeta De Credito/Debito";
        $tipo->save();
    }
}
