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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario')->unsigned()->index();
            $table->bigInteger('id_comercio')->unsigned()->nullable()->index(); // Allow null for non-commerce transactions (e.g., Recarga)
            $table->dateTime('fecha_transaccion');
            $table->decimal('monto', 10, 2);
            $table->enum('tipo_transaccion', ['Compra', 'Recarga', 'Premio'])->default('Compra');
            $table->enum('estado', ['Pendiente', 'Completada', 'Cancelada'])->default('Pendiente');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_comercio')->references('id')->on('comercios')->onDelete('cascade'); // Foreign key for id_comercio
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
