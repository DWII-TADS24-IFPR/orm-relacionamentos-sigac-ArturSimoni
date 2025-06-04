<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nome" => "Jorge",
                "cpf" => "12345678900",
                "email" => "jorge@jorge.com",
                "senha" => bcrypt("jorge"),
                "user_id" => null,
                "curso_id" => 1,
                "turma_id" => 1,
            ],

            [
                "nome" => "Maria",
                "cpf" => "00987654321",
                "email" => "maria@maria.com",
                "senha" => bcrypt("maria"),
                "user_id" => null,
                "curso_id" => 2,
                "turma_id" => 2,
            ],
        ];

        DB::table('alunos')->insert($data);
    }
}
