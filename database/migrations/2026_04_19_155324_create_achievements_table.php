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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Formation, Concours, Hackathon, Certification
            $table->string('title');
            $table->string('institution')->nullable(); // École, Organisateur
            $table->string('date')->nullable(); // Année ou période
            $table->text('description')->nullable();
            $table->string('image_url')->nullable(); // Pour la photo de la certification
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
