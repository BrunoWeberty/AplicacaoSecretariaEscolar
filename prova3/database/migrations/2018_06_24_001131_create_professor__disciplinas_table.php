<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_disciplina', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professor_id')->unsigned()->nullable();
            $table->foreign('professor_id')->references('id')->on('professor')->
    onDelete('cascade');
            //Campo e Chave estrangeira para disciplina
            $table->integer('disciplina_id')->unsigned()->nullable();
            $table->foreign('disciplina_id')->references('id')->on('disciplina')->
    onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_disciplina');
    }
}
