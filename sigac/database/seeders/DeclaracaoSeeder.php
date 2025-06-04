<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeclaracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "hash" => "1234567890abcdef",
                "data" => now(),
                "aluno_id" => 1,
                "comprovante_id" => 1,

            ],

            [
                "hash" => "abcdef1234567890",
                "data" => now(),
                "aluno_id" => 2,
                "comprovante_id" => 2,

            ],
        ];

        DB::table('declaracoes')->insert($data);
    }
}
