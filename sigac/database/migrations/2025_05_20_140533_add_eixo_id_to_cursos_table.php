<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Schema::table('cursos', function (Blueprint $table) {
    //     $table->unsignedBigInteger('eixo_id')->nullable()->after('id');
    // });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
//     Schema::table('cursos', function (Blueprint $table) {
//         // Se criou a foreign key, remova antes:
//         // $table->dropForeign(['eixo_id']);
//         $table->dropColumn('eixo_id');
//     });
}
};
