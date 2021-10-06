<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMedicosAddNewColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicos', function (Blueprint $table) {
            $table->unsignedBigInteger('pessoa_id')->nullable()->after('id');  /**after == cria pessoa_id DEPOIS de id */
            $table->unsignedBigInteger('especialidade_id')->nullable()->after('pessoa_id');
            $table->date('dataAdmissao_medico')->nullable();
            $table->char('ufcrm_medico', 2)->nullable()->after('crm_medico');
            $table->decimal('salario_medico', 8, 2)->nullable()->after('ufcrm_medico'); /**8 digitos, 2 casas decimais */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicos', function (Blueprint $table) {
            $table->dropColumn('pessoa_id');
            $table->dropColumn('especialidade_id');
            $table->dropColumn('dataAdmissao_medico');
            $table->dropColumn('ufcrm_medico');
            $table->dropColumn('salario_medico');
        });
    }
}
