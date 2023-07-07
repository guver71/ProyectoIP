<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Egresado;
use App\Models\Empresa;
use App\Models\Postulacion;
use App\Models\Trabajo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(10)->create();
        Egresado::factory(10)->create();
        Empresa::factory(10)->create();
        Trabajo::factory(10)->create();
        Postulacion::factory(10)->create();
    }
}
