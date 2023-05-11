<?php

namespace Database\Seeders;

use App\Models\FotoUsuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foto_usuario= new FotoUsuarios();
        $foto_usuario->idFoto=1;
        $foto_usuario->idUser=2;
        $foto_usuario->comprado=0;
        $foto_usuario->save();
        
        $foto_usuario= new FotoUsuarios();
        $foto_usuario->idFoto=2;
        $foto_usuario->idUser=1;
        $foto_usuario->comprado=0;
        $foto_usuario->save();

        $foto_usuario= new FotoUsuarios();
        $foto_usuario->idFoto=2;
        $foto_usuario->idUser=2;
        $foto_usuario->comprado=0;
        $foto_usuario->save();

        $foto_usuario= new FotoUsuarios();
        $foto_usuario->idFoto=3;
        $foto_usuario->idUser=1;
        $foto_usuario->comprado=0;
        $foto_usuario->save();

        /*$foto_usuario= new FotoUsuarios();
        $foto_usuario->idFoto=4;
        $foto_usuario->idUser=2;
        $foto_usuario->comprado=0;
        $foto_usuario->save(); */
    }
}
