<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'nome',
        'crm'
    ];

    //Criar uma função para estabelecer a associação (relacionamento) entre a classe Medico e Consulta
    public function consulta(){
        //Especificar o tipo de associação
        return $this->hasMany(consulta::class); //hasMany == um médico pode ter uma ou várias consultas
    }
}
