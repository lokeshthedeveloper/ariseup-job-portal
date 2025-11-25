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
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            $table->enum('company_type', ['company', 'consultancy'])->default('company')->after('name');
            $table->string('phone')->nullable()->after('company_type');
            $table->timestamp('phone_verified_at')->nullable()->after('phone');
            $table->boolean('email_verified')->default(false)->after('phone_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'company_type', 'phone', 'phone_verified_at', 'email_verified']);
        });
    }
};
