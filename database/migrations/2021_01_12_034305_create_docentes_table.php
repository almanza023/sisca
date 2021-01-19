<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id')->references('id')->on('sedes');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('documento');
            $table->string('correo');
            $table->string('telefono');
            $table->string('escalafon')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('nivel')->nullable();
            $table->integer('tipo');
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
        Schema::dropIfExists('docentes');
    }
}
