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
        Schema::create('monthly_progress_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monthly_progress_id');
            $table->foreign('monthly_progress_id')->references('id')->on('monthly_progress')->onDelete('cascade');
            $table->string('grade');
            $table->longText('comments')->nullable();
            $table->string('graded_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_progress_grades');
    }
};
