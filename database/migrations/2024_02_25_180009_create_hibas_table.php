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
        Schema::create('hibas', function (Blueprint $table) {
            $table->id();
            $table->string("hibaMegnevezese", 50);
            $table->string("hibaLeirasa", 300);
            $table->string("hibaHelye", 100);
            $table->string("hibaKepe", 300);
            $table->DateTime("bejelentesIdopontja");
            $table->enum("hibaAllapota",['bejelentés alatt', 'folyamatban', 'kész'])->default('bejelentés alatt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hibas');
    }
};
