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
            $table->bigInteger('id_monedero')->unsigned()->index();
            $table->bigInteger('id_comercio')->unsigned()->index();

            $table->dateTime('fecha_transaccion');
            $table->decimal('cantidad', 10, 2);
            $table->string('concepto', 40)->nullable();
            $table->enum('tipo_transaccion', ['Compra', 'Recarga', 'Premio'])->default('Compra');
            $table->enum('estado', ['Pendiente', 'Realizada', 'Cancelada'])->default('Pendiente');
            $table->timestamps();

            $table->foreign('id_monedero')->references('id')->on('monederos')->onDelete('cascade');
            $table->foreign('id_comercio')->references('id')->on('comercios')->onDelete('cascade');
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
