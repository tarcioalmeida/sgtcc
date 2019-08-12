<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronograma',function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_curso', 100)->nullable();
            $table->integer('materia_id')->unsigned()->nullable();
            $table->foreign('materia_id')->references('id')->on('tcc_materia');
            $table->integer('professor_tcc_id')->unsigned()->nullable();
            $table->foreign('professor_tcc_id')->references('id')->on('users');
            $table->integer('tipo_entrega_id')->unsigned()->nullable();
            $table->foreign('tipo_entrega_id')->references('id')->on('tipo_entrega');
            $table->string('descricao',500);
            $table->timestamp('data_entrega_inicio')->nullable();
            $table->timestamp('data_entrega_fim')->nullable();
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
        Schema::drop('cronograma');
    }
}
