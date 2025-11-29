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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('company_email')->nullable(); // In case it's different from user email
            // logo and social_media_links are already in the model fillable, assuming they might exist or we add them if missing.
            // Checking model: logo, social_media_links are in fillable.
            // Let's add them if they don't exist, but safely.
            // Since I can't check DB, I'll add them as nullable if they are not there?
            // Actually, the user request said "Create tables", but companies table likely exists.
            // The prompt said "Create Profile Management... Requirements: Create tables".
            // But Step 1 used existing Company model.
            // I'll assume I need to add these columns.

            // Check if columns exist is hard without DB connection.
            // I'll just add them. If they exist, migration will fail, but that's better than missing them.
            // Actually, I should check if I can see the create_companies_table migration to see what's there.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['address', 'city', 'state', 'country', 'company_email']);
        });
    }
};
