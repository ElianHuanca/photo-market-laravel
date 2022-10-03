<?php

namespace Database\Seeders;

use App\Models\Fotografo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotografoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotografo= new Fotografo();
        $fotografo->idUser=3;
        $fotografo->idEvento=1;
        $fotografo->save();

        $fotografo= new Fotografo();
        $fotografo->idUser=4;
        $fotografo->idEvento=1;
        $fotografo->save();

        $fotografo= new Fotografo();
        $fotografo->idUser=3;
        $fotografo->idEvento=2;
        $fotografo->save();
    }
}
