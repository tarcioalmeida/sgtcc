<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto',function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_projeto', 80);
            $table->string('area',60);
            $table->string('descricao',2000);
            $table->string('semestre',20);
            $table->string('grupo_pesquisa',100)->nullable();
            $table->integer('ano');
            $table->integer('curso_id')->unsigned()->nullable();
            $table->foreign('curso_id')->references('id')->on('curso');
            $table->integer('tcc_id')->unsigned();
            $table->foreign('tcc_id')->references('id')->on('tcc_materia');
            $table->integer('aluno_id')->unsigned()->nullable();
            $table->foreign('aluno_id')->references('id')->on('users');
            $table->integer('professor_tcc_id')->unsigned()->nullable();
            $table->foreign('professor_tcc_id')->references('id')->on('users');
            $table->integer('professor_orientador_id')->unsigned();
            $table->foreign('professor_orientador_id')->references('id')->on('users');
            $table->timestampsTz();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projeto');
    }
}
