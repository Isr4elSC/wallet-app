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
            $table->id()->unique()->index();
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->string('nombre');
            $table->string('nif')->unique();
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('provincia');
            $table->string('cp');
            $table->string('telefono')->nullable();
            $table->string('email')->unique();
            $table->string('web')->nullable();
            $table->string('logo')->nullable();
            $table->decimal('saldo', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comercios', function (Blueprint $table) {
            $table->dropForeign('comercios_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('comercios');
    }
};
