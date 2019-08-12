<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file', 60);
            $table->string('descricao',150)->nullable();
            $table->string('tipo',150)->nullable();
            $table->string('tamanho')->nullable();
            $table->string('caminho')->nullable();
            $table->integer('tcc_id')->unsigned()->nullable();
            $table->foreign('tcc_id')->references('id')->on('tcc_materia');
            $table->integer('professor_orientador_id')->unsigned()->nullable();
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
        Schema::dropIfExists('arquivos');
    }
}