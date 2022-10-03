<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new Rol();
        $rol->rol='Cliente';
        $rol->save();

        $rol = new Rol();
        $rol->rol='Fotografo';
        $rol->save();

        $rol = new Rol();
        $rol->rol='Organizador';
        $rol->save();

    }
}
