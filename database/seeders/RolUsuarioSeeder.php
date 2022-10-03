<?php

namespace Database\Seeders;

use App\Models\RolUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolUser= new RolUsuario();
        $rolUser->idRol=1;
        $rolUser->idUser=1;
        $rolUser->save();

        $rolUser= new RolUsuario();
        $rolUser->idRol=1;
        $rolUser->idUser=2;
        $rolUser->save();

        $rolUser= new RolUsuario();
        $rolUser->idRol=2;
        $rolUser->idUser=3;
        $rolUser->save();

        $rolUser= new RolUsuario();
        $rolUser->idRol=2;
        $rolUser->idUser=4;
        $rolUser->save();

        $rolUser= new RolUsuario();
        $rolUser->idRol=3;
        $rolUser->idUser=5;
        $rolUser->save();

    }
}
