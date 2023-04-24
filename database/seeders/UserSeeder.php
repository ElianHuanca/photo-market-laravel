<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Clientes
        $user=new User();
        $user->name = 'Diana Paniagua';
        $user->email = 'Diana@gmail.com';
        //$user->url="";
        $user->password = bcrypt('123456');
        $user->idRol=1;
        $user->save();

        $user=new User();
        $user->name = 'Elian Huanca';
        $user->email = 'Elian@gmail.com';
        //$user->url="";
        $user->password = bcrypt('123456');
        $user->idRol=1;
        $user->save();
        
        //Fotografos
        $user=new User();
        $user->name = 'Isela Huanca';
        $user->email = 'Isela@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRol=2;
        $user->save();
        
        $user=new User();
        $user->name = 'Aldo Choque';
        $user->email = 'Aldo@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRol=2;
        $user->save();

        //Organizador
        $user=new User();
        $user->name = 'Mary Choque';
        $user->email = 'Mary@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRol=3;
        $user->save();
    }
}
