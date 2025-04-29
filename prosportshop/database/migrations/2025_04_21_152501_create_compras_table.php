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
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->foreignId('id_usuario')->references('id_usuario')->on('users');
            $table->foreignId('id_producto')->references('id_producto')->on('productos');
            $table->date('fecha_compra');
            $table->decimal('precio_compra', 10, 2);
            $table->string('estado_transaccion');
            $table->text('comentario')->nullable();
            $table->integer('valoracion')->nullable();
            $table->timestamps();
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
