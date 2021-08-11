<?php

namespace App;  //referência ao diretorio onde o arquivo se encontra, ou seja, "paciente.php" está dentro da pasta app

use Illuminate\Database\Eloquent\Model; //igual ao import do java, dependência que precisa usar

class Paciente extends Model     //classe paciente que herda da classe model (não se edita a classe model)
{
    // Definindo os atributos iniciais

    protected $fillable = ['nome', 'genero']; //protected = só terão acesso as classes que tiverem herança desta classe

}
