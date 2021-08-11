<?php

//migration é um arquivo php que contém as definições das tabelas do banco, 100% linguagem php sem usar mysql

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint; //ferramenta open-source que permite que os arquivos do laravel sejam lidos facilmente
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //função up faz as coisas, cria, altera, etc
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('genero');
            $table->timestamps();  //função timestamps permite que a tabela funcione e tenha suas datas de criação e alteração
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  //função down desfaz as coisas, é executado SE der errado
    {
        Schema::dropIfExists('pacientes');
    }
}
