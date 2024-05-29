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
        Schema::create('comercios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('nombre_comercio');
            $table->text('descripcion')->nullable();
            $table->string('categoria');
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('email')->unique();
            $table->string('logo')->nullable();
            $table->string('web')->nullable();
            $table->decimal('calificacion', 10, 2)->nullable();
            $table->decimal('saldo_disponible', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comercios');
    }
};
