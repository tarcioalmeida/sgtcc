<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('matricula',20);
            $table->string('telefone',60)->nullable();
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('curso');
            $table->integer('atuacao_id')->unsigned();
            $table->foreign('atuacao_id')->references('id')->on('atuacao');
            $table->rememberToken();
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
