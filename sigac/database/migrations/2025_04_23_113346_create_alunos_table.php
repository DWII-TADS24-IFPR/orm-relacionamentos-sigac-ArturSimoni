<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('email');
            $table->string('senha');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->foreignId('turma_id')->constrained('turmas')->onDelete('cascade');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};

//version: '3.8'

// services:
//   php-web:
//     image: php:8.2-apache
//     ports:
//       - "8080:80"
//     volumes:
//       - ./php/public:/var/www/html # Pasta pública
//       - ./php/scripts-php:/var/www/scripts # Scripts PHP
//     networks:
//       - php-network
//     command: >
//       bash -c "docker-php-ext-install pdo pdo_mysql && apache2-foreground"
  
//   mysql:
//     image: mysql:8.0
//     environment:
//       MYSQL_ROOT_PASSWORD: root
//       MYSQL_DATABASE: aula_db
//     ports:
//       - "3307:3306"
//     volumes:
//       - mysql-data:/var/lib/mysql
//     networks:
//       - php-network
  
//   phpmyadmin:
//     image: phpmyadmin/phpmyadmin
//     ports:
//       - "8081:80"
//     environment:
//       PMA_HOST: mysql
//     depends_on:
//       - mysql
//     networks:
//       - php-network

// volumes:
//   mysql-data:

// networks:
//   php-network: