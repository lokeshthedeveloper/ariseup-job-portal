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
            // Drop existing columns if they exist (to change type cleanly, or just change)
            // Since we are changing from string to unsignedBigInteger, it's safer to drop and recreate or use change() if doctrine/dbal is installed.
            // Assuming no data preservation needed as per plan.

            $table->dropColumn(['country', 'state', 'district', 'city']);
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('country')->nullable()->after('company_size');
            $table->unsignedBigInteger('state')->nullable()->after('country');
            $table->unsignedBigInteger('district')->nullable()->after('state');
            $table->unsignedBigInteger('city')->nullable()->after('district');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['country', 'state', 'district', 'city']);
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
        });
    }
};
