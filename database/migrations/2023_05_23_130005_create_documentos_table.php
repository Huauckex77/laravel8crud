<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('anio')->nullable();
            $table->string('cudap')->nullable();
            $table->integer('archivo')->nullable();
            $table->string('expediente');
            $table->date('fecha');
            $table->date('fecha_registra');
            $table->string('hora_registra');
            $table->integer('carrera_id');
            $table->string('estadoporcual_id')->nullable();
            $table->string('normas_rel')->nullable();
            $table->string('normas_rector')->nullable();
            $table->string('res_rector_normas');
            $table->string('usuario_registra');
            $table->unsignedBigInteger('dependenciaaplicacion_id');
            $table->unsignedBigInteger('dependenciagenera_id');
            $table->unsignedBigInteger('dependencia_id');
            $table->unsignedBigInteger('autoridad_id');
            $table->unsignedBigInteger('tipoestado_id');
            $table->unsignedBigInteger('tipodoc_id');
            $table->unsignedBigInteger('tipoacceso_id');
            $table->unsignedBigInteger('programa_id');
            

            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade'); 
            $table->foreign('tipoacceso_id')->references('id')->on('tipoaccesos')->onDelete('cascade'); 
            $table->foreign('tipodoc_id')->references('id')->on('tipodocs')->onDelete('cascade'); 
            $table->foreign('tipoestado_id')->references('id')->on('tipoestados')->onDelete('cascade'); 
            $table->foreign('autoridad_id')->references('id')->on('autoridades')->onDelete('cascade'); 
            $table->foreign('dependencia_id')->references('id')->on('dependencias')->onDelete('cascade'); 
            $table->foreign('dependenciaaplicacion_id')->references('id')->on('dependencias')->onDelete('cascade');
            $table->foreign('dependenciagenera_id')->references('id')->on('dependencias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
