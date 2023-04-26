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
        $user->email = 'diana@gmail.com';
        $user->url="https://sw1-proyects.s3.amazonaws.com/user1/V7vcFu0dMH1JME4gCKboFBjMvCAMqhWl32dDUT2Q.jpg";
        $user->password = bcrypt('123456');
        $user->idRol=1;
        $user->save();

        $user=new User();
        $user->name = 'Elian Huanca';
        $user->email = 'elian@gmail.com';
        $user->url="https://sw1-proyects.s3.amazonaws.com/user2/RVCdTuNSj5dQwRNC6f2zPezgK4nc2vsCUkC8NkLA.jpg";
        $user->password = bcrypt('123456');
        $user->idRol=1;
        $user->save();
        
        //Fotografos
        $user=new User();
        $user->name = 'Isela Huanca';
        $user->email = 'isela@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRol=2;
        $user->save();
        
        $user=new User();
        $user->name = 'Aldo Choque';
        $user->email = 'aldo@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRol=2;
        $user->save();

        //Organizador
        $user=new User();
        $user->name = 'Mary Choque';
        $user->email = 'mary@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRol=3;
        $user->save();
    }
}
