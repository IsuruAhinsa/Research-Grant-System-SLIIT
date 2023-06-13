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
        Schema::create('principal_investigators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->unsignedBigInteger('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('research_title');
            $table->string('phone');
            $table->string('email');
            $table->string('dean_name');
            $table->string('dean_email');
            $table->string('resume');
            $table->string('research_grant_proposal');
            $table->string('budget_activity_plan');
            $table->text('remarks')->nullable();
            $table->string('grant_number')->nullable();
            $table->boolean('is_agreed')->default(false);
            $table->enum('type', ['NEW', 'CORRECTED']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('principal_investigators');
    }
};
