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
        Schema::create('co_principal_investigators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('principal_investigator_id');
            $table->foreign('principal_investigator_id')
                ->on('principal_investigators')
                ->references('id')
                ->cascadeOnDelete();
            $table->string('attachment');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_principal_investigators');
    }
};
