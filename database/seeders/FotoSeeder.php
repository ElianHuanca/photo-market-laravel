<?php

namespace Database\Seeders;

use App\Models\Foto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foto = new Foto();
        $foto->url='https://imgwoman.elperiodico.com/be/53/59/keira-knightley-vuelve-piratas-caribe-650x422.jpg';
        $foto->precio=10;
        $foto->idEvento=1;
        $foto->idUser=3;

        $foto = new Foto();
        $foto->url='https://www.nacionrex.com/__export/1542486175545/sites/debate/img/2018/11/17/1piratascaribe-1200x600_crop1542486108272.jpg_242310155.jpg';
        $foto->precio=10;
        $foto->idEvento=1;
        $foto->idUser=4;

        $foto = new Foto();
        $foto->url='https://boliviaemprende.com/wp-content/uploads/2020/03/fexpocruz.jpg';
        $foto->precio=10;
        $foto->idEvento=2;
        $foto->idUser=3;

        $foto = new Foto();
        $foto->url='https://www.cao.org.bo/wp-content/uploads/2022/08/2-1.jpg';
        $foto->precio=10;
        $foto->idEvento=2;
        $foto->idUser=3;
    }
}
