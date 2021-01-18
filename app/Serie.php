<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //O laravel quando tem classes que extende do Eloquent, tem o poder de pegar o nome da classe, definir ela em minúsculo e no plural
    //Depois ela identifica a tabela com o mesmo nome que o laravel alterou para poder manipulá-la automaticamente
    //Por isso, a linha abaixo foi comentada, provando que não é necessário vincular um atributo e referenciar a tabela
    //protected $table = 'series'; //Definido atributo referênciando qual a tabela que será manipulada

    public $timestamps = false;
    protected $fillable = ['nome'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
