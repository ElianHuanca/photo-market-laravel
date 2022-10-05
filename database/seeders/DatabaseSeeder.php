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
        $this->call(RolUsuarioSeeder::class);
        $this->call(UserPhotoSeeder::class);
        $this->call(TipoEventoSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(FotografoSeeder::class);
        $this->call(ParticipanteSeeder::class);
        $this->call(FotoSeeder::class);
        $this->call(FotoUsuariosSeeder::class);
    }
}
