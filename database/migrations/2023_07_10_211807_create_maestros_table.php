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
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->string('firs_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('bith_date');
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};

/* 
    public function up(): void
    {Schema::create('teachers', function (Blueprint $table) 
    {$table->id();
    $table->unsignedBigInteger('id_user_fk');
    $table->string('nombre');$table->string('apellido');
    $table->string('direccion');$table->date('fecha_cumpleaños');
    $table->foreign('id_user_fk')->references('id')->on('users');});}
 */
