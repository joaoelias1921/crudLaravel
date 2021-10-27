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
        DB::table('cargos')->insert([
            'nome_cargo' => 'Secretária(o)',
            'desc_cargo' => 'Sem descrição cadastrada!'
        ]);
    }
}
