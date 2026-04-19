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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_en')->nullable();
            $table->text('description_en')->nullable();
        });
        Schema::table('skills', function (Blueprint $table) {
            $table->string('name_en')->nullable();
        });
        Schema::table('stats', function (Blueprint $table) {
            $table->string('label_en')->nullable();
        });
        Schema::table('achievements', function (Blueprint $table) {
            $table->string('title_en')->nullable();
            $table->string('institution_en')->nullable();
            $table->text('description_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) { $table->dropColumn(['title_en', 'description_en']); });
        Schema::table('skills', function (Blueprint $table) { $table->dropColumn('name_en'); });
        Schema::table('stats', function (Blueprint $table) { $table->dropColumn('label_en'); });
        Schema::table('achievements', function (Blueprint $table) { $table->dropColumn(['title_en', 'institution_en', 'description_en']); });
    }
};
