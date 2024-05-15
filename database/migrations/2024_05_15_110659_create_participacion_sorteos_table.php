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
        Schema::create('participacion_sorteos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario')->unsigned()->index();
            $table->bigInteger('id_sorteo')->unsigned()->index();
            $table->dateTime('fecha_participacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participacion_sorteos');
    }
};
