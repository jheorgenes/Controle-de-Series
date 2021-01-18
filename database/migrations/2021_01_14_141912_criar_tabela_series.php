<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //Roda a migração
    {
        //Facades ou Fachada para criar uma tabela chamada series
        //Quando se quer utilizar um método de uma outra classe, essa é uma forma curta de fazer isso
        //Recebe como segundo argumento, a função para definir como será executado a criação da tabela.
        //Blueprint é uma classe que está injetando sua estrutura de classe na variável table
        //Importante lembrar que nesse caso, a injeção de dependêcias do Blueprint faz com que a variável table se torne um objeto


        Schema::create('series', function (Blueprint $table) //Criando tabela Séries, executando a função do objeto $table
        {
            $table->increments('id'); //Alimentando a coluna ID por incrementação
            $table->string('nome'); //Alimentando a coluna nome com o tipo string
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //Reverte a migração
    {
        Schema::drop('series'); //Dropando tabela Séries
    }
}
