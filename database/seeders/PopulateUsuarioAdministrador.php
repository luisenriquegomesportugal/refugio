<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopulateUsuarioAdministrador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User([
            "google_id" => '114406108138009642673',
            "nome" => 'Luis Enrique',
            "nome_completo" => 'Luis Enrique Gomes Portugal',
            "email" => 'luisenriquegomesportugal@gmail.com',
            "foto" => 'https://lh3.googleusercontent.com/a/AEdFTp5viVyjeK0y_4A9XBRcCQbsrsNWxs5aNNQd20sMUPU=s96-c',
            "acesso" => true,
        ]);

        $usuario->save();
    }
}
