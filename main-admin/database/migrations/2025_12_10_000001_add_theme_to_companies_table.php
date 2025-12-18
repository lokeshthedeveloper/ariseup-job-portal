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
            // Add theme relationship
            $table->foreignId('theme_id')->nullable()->after('id')->constrained('themes')->onDelete('set null');

            // Ensure website field exists and is unique for multi-tenant routing
            if (!Schema::hasColumn('companies', 'subdomain')) {
                $table->string('subdomain')->nullable()->unique()->after('website');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['theme_id']);
            $table->dropColumn('theme_id');

            if (Schema::hasColumn('companies', 'subdomain')) {
                $table->dropColumn('subdomain');
            }
        });
    }
};
