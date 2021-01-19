<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaAcademicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_academicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')->references('id')->on('docentes');

            $table->unsignedBigInteger('grado_id');
            $table->foreign('grado_id')->references('id')->on('grados');

            $table->unsignedBigInteger('asignatura_id');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');

            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id')->references('id')->on('sedes');

            $table->integer('ihs');
            $table->integer('porcentaje')->nullable();
            $table->integer('estado')->default(1);

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
        Schema::dropIfExists('carga_academicas');
    }
}
