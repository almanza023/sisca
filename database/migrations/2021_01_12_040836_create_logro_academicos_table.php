<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogroAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logro_academicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id')->references('id')->on('sedes');

            $table->unsignedBigInteger('grado_id');
            $table->foreign('grado_id')->references('id')->on('grados');

            $table->unsignedBigInteger('asignatura_id');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');

            $table->unsignedBigInteger('periodo_id');
            $table->foreign('periodo_id')->references('id')->on('periodos');

            $table->unsignedBigInteger('tipo_logro_id');
            $table->foreign('tipo_logro_id')->references('id')->on('tipo_logros');

            $table->string('descripcion');
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
        Schema::dropIfExists('logro_academicos');
    }
}
