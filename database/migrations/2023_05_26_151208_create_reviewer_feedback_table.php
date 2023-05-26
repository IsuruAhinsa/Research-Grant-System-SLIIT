<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviewer_feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('principal_investigator_id');
            $table->unsignedBigInteger('reviewer_id');
            $table->foreign('principal_investigator_id')->references('id')->on('principal_investigators')->onDelete('cascade');
            $table->foreign('reviewer_id')->references('id')->on('users')->onDelete('cascade');
            // 1.1	Objectives
            $table->integer('objectives_clarity');
            $table->integer('objectives_realistic');
            $table->integer('objectives_achievable');
            $table->text('objectives_comments')->nullable();
            // 1.2	Contribution
            $table->integer('contribution_beyond');
            $table->integer('contribution_state_of_affairs');
            $table->integer('contribution_references');
            $table->text('contribution_comments')->nullable();
            // 1.3	Approach
            $table->integer('approach_concept');
            $table->integer('approach_transitions');
            $table->integer('approach_references');
            $table->integer('approach_methodology');
            $table->text('approach_comments')->nullable();
            // 2.1 Impact of project outcomes
            $table->integer('impact_technology');
            $table->integer('impact_knowledge');
            $table->integer('impact_economic');
            $table->integer('impact_social');
            $table->integer('impact_other');
            $table->text('impact_comments')->nullable();
            // 2.2 Dissemination of outcomes
            $table->integer('impact_dissemination_plan');
            // 3. Work Plan
            $table->integer('work_plan_structure');
            $table->integer('work_plan_details');
            $table->integer('work_plan_approaches_activities');
            $table->integer('work_plan_timing');
            $table->text('work_plan_comments')->nullable();
            // 4. Budget
            $table->integer('budget_realistic');
            $table->integer('budget_disbursement_plan');
            $table->integer('budget_expected_outcomes');
            $table->text('budget_comments')->nullable();
            // 5. Availability of Resource
            $table->integer('resource_capacity_lead');
            $table->integer('resource_background_co_investigators');
            $table->integer('resource_infrastructure_institutions');
            $table->integer('resource_capable_proposers');
            $table->text('resource_comments')->nullable();
            // 6. Overall Evaluation and Recommendations
            $table->integer('overall_strong');
            $table->integer('overall_recommendation');
            $table->longText('overall_comments')->nullable();
            $table->text('suggestions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewer_feedback');
    }
};
