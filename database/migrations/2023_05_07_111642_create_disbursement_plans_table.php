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
        Schema::create('disbursement_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('principal_investigator_id');
            $table->foreign('principal_investigator_id')
                ->on('principal_investigators')
                ->references('id')
                ->cascadeOnDelete();
            $table->string('category');
            $table->string('month');
            $table->string('activity', 100);
            $table->double('amount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursement_plans');
    }
};
