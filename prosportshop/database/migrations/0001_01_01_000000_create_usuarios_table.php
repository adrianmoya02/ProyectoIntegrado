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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre');
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->text('direccion')->nullable();
            $table->string('email')->unique();
            $table->string('contrasena');
            $table->string('numero_cuenta');
            $table->string('rol');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('codigo_postal', 10);
            $table->string('telefono', 15);
            $table->date('fecha_nacimiento');
            $table->string('estado');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
