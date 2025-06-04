<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('eixos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });
        Schema::table('cursos', function (Blueprint $table) {
            $table->unsignedBigInteger('eixo_id')->nullable()->after('id');
            $table->foreign('eixo_id')->references('id')->on('eixos')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['eixo_id']);
            $table->dropColumn('eixo_id');
        });
        Schema::dropIfExists('eixos');
    }
};
