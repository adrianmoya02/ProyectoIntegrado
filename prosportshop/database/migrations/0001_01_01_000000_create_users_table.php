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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre');
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->text('direccion')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('numero_cuenta');
            $table->enum('rol', ['user', 'admin'])->default('user');            
            $table->string('localidad');
            $table->string('provincia');
            $table->string('codigo_postal', 10);
            $table->string('telefono', 15);
            $table->date('fecha_nacimiento');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');            
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
        });
    }
};
