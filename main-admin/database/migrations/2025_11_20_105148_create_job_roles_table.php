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
        Schema::create('job_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('role_category_id')->constrained('role_categories')->onDelete('cascade');
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=inactive');
            $table->timestamps();
            $table->softDeletes();

            $table->index('name');
            $table->index('role_category_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_roles');
    }
};
