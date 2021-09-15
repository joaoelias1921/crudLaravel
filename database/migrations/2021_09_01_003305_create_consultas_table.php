<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            //$table->unsignedBigInteger('medico_id');
            $table->date('data');
            $table->time('hora');
            $table->timestamps();
            $table->foreign('paciente_id')->references('id')->on('pacientes');  //declaração chave estrangeira
            $table->foreignId('medico_id')->constrained('medicos'); //outra forma de declarar chave estrangeira
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
