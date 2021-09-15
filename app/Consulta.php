<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = ['paciente_id', 'medico_id', 'data', 'hora'];

    //Criar uma função para estabelecer a associação (relacionamento) entre a classe Consulta e Paciente
    public function paciente(){
        return $this->belongsTo(Paciente::class);   //belongsTo == essa consulta PERTENCE a um paciente
    }

    //Criar uma função para estabelecer a associação (relacionamento) entre a classe Consulta e Médico
    public function medico(){
        return $this->belongsTo(Medico::class); //belongsTo == essa consulta PERTENCE também a um médico
    }
}
