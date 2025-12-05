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
        Schema::dropIfExists('company_themes');
        Schema::dropIfExists('themes');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Create themes table
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('theme_name');
            $table->string('section_type');
            $table->string('view_file');
            $table->string('screenshot')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Create company_themes table
        Schema::create('company_themes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('theme_id')->constrained()->onDelete('cascade');
            $table->string('section_type');
            $table->timestamps();

            $table->unique(['company_id', 'section_type']);
        });
    }
};
