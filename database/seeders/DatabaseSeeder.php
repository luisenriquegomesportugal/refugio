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
        // Célula
        $redeCelulas = [
            3 => [41, 61, 75, 91, 102, 108, 115, 121],
            4 => [19, 20, 48, 57, 73, 100],
            5 => [29, 39, 71, 77, 84, 104, 107, 122],
            6 => [3, 6, 8, 9, 14, 25, 34, 36, 40, 82, 106],
            7 => [31, 69, 79, 81],
            8 => [5, 10, 27, 60, 119],
            9 => [18, 23, 43, 62, 67, 93],
            10 => [11, 26, 30, 42, 55, 78, 95, 110, 111],
            11 => [38, 46, 59],
            12 => [2, 4, 7, 44, 53, 56, 90, 98],
            13 => [37, 65, 83, 92, 113, 118],
            14 => [1, 15, 21, 24, 33, 66, 89, 96, 105, 114],
            15 => [35, 45, 50, 70, 72],
            16 => [47, 52, 64, 86, 88, 116, 120],
            17 => [22, 54, 63, 68, 87, 94, 103, 109, 117],
            18 => [28, 32, 76, 80, 99, 112, 123],
            19 => [12, 13, 17, 49, 58, 74, 101],
        ];

        foreach ($redeCelulas as $rede => $celulas) {
            $redeModel = Rede::firstOrCreate([
                "id" => $rede,
                "nome" => "Rede {$rede}"
            ]);

            foreach ($celulas as $celula) {   
                $redeModel->celulas()->firstOrCreate([
                    "id" => $celula,
                    "nome" => "Refúgio {$celula}"
                ]);
            }
        }

        // Usuário
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
