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
        Schema::create('monthly_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('principal_investigator_id');
            $table->foreign('principal_investigator_id')->references('id')->on('principal_investigators')->onDelete('cascade');
            $table->longText('current_progress');
            $table->string('current_progress_month');
            $table->year('current_progress_year');
            $table->longText('next_progress');
            $table->string('next_progress_month');
            $table->year('next_progress_year');
            $table->text('issues')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_progress');
    }
};
