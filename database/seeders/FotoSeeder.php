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
        $foto->url='https://sw1-proyects.s3.amazonaws.com/evento1/CuEgnuQ5oX2j52GNstwcnmZzv7m6x5HY6JtBxn3J.jpg';
        $foto->precio=10;
        $foto->idEvento=1;
        $foto->idUser=3;
        $foto->save();      
        
        $foto = new Foto();
        $foto->url='https://sw1-proyects.s3.amazonaws.com/evento1/i6hL3JvHnb1aZ1ks8vWg2HOTx6VTbKqpwbS7y6dS.jpg';
        $foto->precio=10;
        $foto->idEvento=1;
        $foto->idUser=3;
        $foto->save();
        
         $foto = new Foto();
        $foto->url='https://sw1-proyects.s3.amazonaws.com/evento2/fWx0mGOYp0AnVyKcZk4N1KcY8h7zwQyFLbq3j6nz.jpg';
        $foto->precio=10;
        $foto->idEvento=2;
        $foto->idUser=3;
        $foto->save();

        /*$foto = new Foto();
        $foto->url='https://sw1-proyects.s3.amazonaws.com/evento1/O0bmtZdRo1U2RaKDWs3SniQ60QQLwJQcgNoVX9aq.jpg';
        $foto->precio=10;
        $foto->idEvento=1;
        $foto->idUser=3;
        $foto->save(); */

        
        //Catalogo De Fotografo
        $foto = new Foto();
        $foto->url='https://sw1-proyects.s3.amazonaws.com/Fotografo3/PZMd3pGqTcbO7GuQutX3u2DSaT4wREyxpUwG9n1Z.jpg';
        $foto->idUser=3;
        $foto->save();

        $foto = new Foto();
        $foto->url='https://sw1-proyects.s3.amazonaws.com/Fotografo3/WR0yck3VADPPsEH5hra0iMxZLSNdECOyyJCXh2wD.jpg';        
        $foto->idUser=3;
        $foto->save();

        $foto = new Foto();
        $foto->url='https://sw1-proyects.s3.amazonaws.com/Fotografo3/XBjvzUfdYQ26KHo6o29Wv3or57dQw1OL8Jo3GOj8.jpg';        
        $foto->idUser=3;
        $foto->save();
        
    }
}
