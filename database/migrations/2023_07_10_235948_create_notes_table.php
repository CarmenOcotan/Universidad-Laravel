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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("alumno_id")->constrained("alumnos")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId("class_id");/* ->constrained("classes")->cascadeOnUpdate()->restrictOnDelete(); */
            $table->string('text');
            $table->tinyInteger('read')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};