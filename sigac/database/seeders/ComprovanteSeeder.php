<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComprovanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "horas" => 10,
                "atividade" => "Palestra Dummy",
                "categoria_id" => 1,
                "aluno_id" => 1,

            ],

            [
                "horas" => 5,
                "atividade" => "Curso Dummy",
                "categoria_id" => 2,
                "aluno_id" => 2,
            ],
        ];

        DB::table('comprovantes')->insert($data);
    }
}
