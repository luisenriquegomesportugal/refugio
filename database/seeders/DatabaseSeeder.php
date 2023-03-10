<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Celula;
use App\Models\Rede;
use App\Models\User;
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
        $this->call([
            PopulateUsuarioAdministrador::class,
            PopulateCelulas::class,
            PopulateDefaultRefukidsTurmas::class
        ]);
    }
}
