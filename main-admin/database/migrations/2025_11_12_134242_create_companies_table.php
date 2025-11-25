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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('industry')->nullable();
            $table->string('company_size')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->json('social_media_links')->nullable();
            $table->json('job_categories')->nullable();
            $table->text('about_us')->nullable();
            $table->text('open_positions_note')->nullable();
            $table->json('contact_info')->nullable();
            $table->text('employee_benefits')->nullable();
            $table->text('work_culture')->nullable();
            $table->text('notable_clients_projects')->nullable();
            $table->text('employee_reviews')->nullable();
            $table->text('diversity_inclusion')->nullable();
            $table->string('company_video')->nullable();
            $table->text('application_process')->nullable();
            $table->text('legal_information')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
