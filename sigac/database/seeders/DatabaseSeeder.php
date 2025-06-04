<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(NivelSeeder::class);
        $this->call(EixoSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(DocumentoSeeder::class);
        $this->call(TurmaSeeder::class);
        $this->call(AlunoSeeder::class);
        $this->call(ComprovanteSeeder::class);
        $this->call(DeclaracaoSeeder::class);
        $this->call(RoleSeeder::class);




    }
}
