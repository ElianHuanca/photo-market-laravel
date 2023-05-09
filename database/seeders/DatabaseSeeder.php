<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EventoSeeder::class);    
        $this->call(ParticipanteSeeder::class);
        $this->call(FotoSeeder::class);
        $this->call(FotoUsuarioSeeder::class);
    }
}
