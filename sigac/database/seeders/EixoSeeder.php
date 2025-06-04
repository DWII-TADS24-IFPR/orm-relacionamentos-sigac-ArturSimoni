<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EixoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nome" => "Tecnologia da Informação",
            ],

            [
                "nome" => "Biológicas",
            ],
        ];

        DB::table('eixos')->insert($data);
    }
}
