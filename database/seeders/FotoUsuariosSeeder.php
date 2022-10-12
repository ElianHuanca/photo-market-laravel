<?php

namespace Database\Seeders;

use App\Models\FotoUsuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotoUser = new FotoUsuarios();
        $fotoUser->idFoto = 1;
        $fotoUser->idUser = 2;
        $fotoUser->save();

        $fotoUser = new FotoUsuarios();
        $fotoUser->idFoto = 2;
        $fotoUser->idUser = 2;
        $fotoUser->save();

        $fotoUser = new FotoUsuarios();
        $fotoUser->idFoto = 4;
        $fotoUser->idUser = 1;
        $fotoUser->save();

        $fotoUser = new FotoUsuarios();
        $fotoUser->idFoto = 1;
        $fotoUser->idUser = 1;
        //$fotoUser->comprado = true;
        $fotoUser->save();

        $fotoUser = new FotoUsuarios();
        $fotoUser->idFoto = 2;
        $fotoUser->idUser = 1;
        $fotoUser->save();
    }
}
