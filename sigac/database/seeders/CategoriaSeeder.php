<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nome" => "Participação em eventos",
                "maximo_horas" => 20,
                "curso_id" => 1,
            ],

            [
                "nome" => "Participação em projetos",
                "maximo_horas" => 30,
                "curso_id" => 2,
            ],
        ];

        DB::table('categorias')->insert($data);
    }
}
