<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nome" => "TÉCNICO EM INFORMÁTICA",
                "sigla" => "INFO",
                "total_horas" => 3600,
                "nivel_id" => 1,
                "eixo_id" => 1,
            ],

            [
                "nome" => "TECNÓLOGO EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS",
                "sigla" => "TADS",
                "total_horas" => 2400,
                "nivel_id" => 2,
                "eixo_id" => 1,
            ],
        ];

        DB::table('cursos')->insert($data);
    }
}
