<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //para usar o factory, não é necessária a instância DB
        //DB::table('cargos')->insert([
        //    'nome_cargo' => 'Secretária(o)',
        //    'desc_cargo' => 'Sem descrição cadastrada!'
        //]);

        factory(\App\Cargo::class,20)->create();
    }
}
