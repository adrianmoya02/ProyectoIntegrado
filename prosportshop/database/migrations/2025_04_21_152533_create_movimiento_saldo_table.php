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
        Schema::create('movimientos_saldo', function (Blueprint $table) {
            $table->id('id_movimiento');
            $table->foreignId('id_usuario')->references('id_usuario')->on('users');
            $table->string('tipo');
            $table->decimal('cantidad', 10, 2);
            $table->date('fecha');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento_saldo');
    }
};
