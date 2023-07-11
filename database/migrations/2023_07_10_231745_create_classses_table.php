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
        Schema::create('classses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("maestro_id")->constrained("maestros")->cascadeOnUpdate()->restrictOnDelete();
            $table->string('name_class');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classses');
    }
};