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
    Schema::create('skills', function (Blueprint $table) {
        $table->id();
        $table->string('category'); // Ex: 'Réseaux', 'Développement Web'
        $table->string('name'); // Ex: 'TCP/IP', 'HTML'
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
