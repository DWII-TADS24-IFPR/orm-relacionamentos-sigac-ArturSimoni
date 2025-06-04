<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "url" => "https://www.youtube.com/watch?v=yGhmfmTwBtI",
                "descricao" => "Documento Dummy",
                "horas_in" => 10,
                "status" => "Aprovado",
                "comentario" => "Bob Esponja dançando",
                "horas_out" => 10,
                "categoria_id" => 1,
            ],

            [

                "url" => "https://www.youtube.com/watch?v=h9uFQv3t1AU",
                "descricao" => "Documento Dummy 2",
                "horas_in" => 5,
                "status" => "Aprovado",
                "comentario" => "Foca girando 10 horas",
                "horas_out" => 5,
                "categoria_id" => 2,
            ],
        ];

        DB::table('documentos')->insert($data);
    }
}
