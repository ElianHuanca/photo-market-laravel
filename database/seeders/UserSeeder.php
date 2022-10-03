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
        $user=new User();
        $user->name = 'diana';
        $user->email = 'diana@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user=new User();
        $user->name = 'Jhonny';
        $user->email = 'Jhonny@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user=new User();
        $user->name = 'Javi';
        $user->email = 'Javi@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        
        $user=new User();
        $user->name = 'aldo';
        $user->email = 'aldo@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user=new User();
        $user->name = 'Emma';
        $user->email = 'Emma@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
