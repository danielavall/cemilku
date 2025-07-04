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
        Schema::create('layer_snacks', function (Blueprint $table) {
            $table->id();
            $table->integer('layer');
            $table->foreignId('id_snack');
            $table->timestamps();
            $table->foreign('id_snack')->on('snacks')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layer_snacks');
    }
};
