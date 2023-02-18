<?php

namespace Database\Seeders;

use App\Models\Turma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopulateDefaultRefukidsTurmas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            ['id' => 'refubabys', 'nome' => "Refubabys"],
            ['id' => 'refukids1', 'nome' => "Refukids 1"],
            ['id' => 'refukids2', 'nome' => "Refukids 2"],
            ['id' => 'refuteens', 'nome' => "Refuteens"]
        ];

        foreach ($attributes as $attribute) {
            $turma = new Turma($attribute);
            $turma->save();
        }
    }
}
