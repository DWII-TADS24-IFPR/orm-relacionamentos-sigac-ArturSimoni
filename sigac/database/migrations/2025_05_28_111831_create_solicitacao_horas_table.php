<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaoHorasTable extends Migration
{
    public function up()
    {
        Schema::create('solicitacao_horas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->string('descricao');
            $table->integer('carga_horaria');
            $table->string('arquivo')->nullable();
            $table->string('status')->default('pendente');
            $table->timestamps();

            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitacao_horas');
    }
}
