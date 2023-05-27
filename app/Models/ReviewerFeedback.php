<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewerFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'principal_investigator_id',
        'reviewer_id',
        // 1.1	Objectives
        'objectives_clarity',
        'objectives_realistic',
        'objectives_achievable',
        'objectives_comments',
        // 1.2	Contribution
        'contribution_beyond',
        'contribution_state_of_affairs',
        'contribution_references',
        'contribution_comments',
        // 1.3	Approach
        'approach_concept',
        'approach_transitions',
        'approach_references',
        'approach_methodology',
        'approach_comments',
        // 2.1 Impact of project outcomes
        'impact_technology',
        'impact_knowledge',
        'impact_economic',
        'impact_social',
        'impact_other',
        'impact_comments',
        // 2.2 Dissemination of outcomes
        'impact_dissemination_plan',
        // 3. Work Plan
        'work_plan_structure',
        'work_plan_details',
        'work_plan_approaches_activities',
        'work_plan_timing',
        'work_plan_comments',
        // 4. Budget
        'budget_realistic',
        'budget_disbursement_plan',
        'budget_expected_outcomes',
        'budget_comments',
        // 5. Availability of Resource
        'resource_capacity_lead',
        'resource_background_co_investigators',
        'resource_infrastructure_institutions',
        'resource_capable_proposers',
        'resource_comments',
        // 6. Overall Evaluation and Recommendations
        'overall_strong',
        'overall_recommendation',
        'overall_comments',
        // 7. Suggestions to Proposers
        'suggestions',
    ];

    public function principalInvestigator(): BelongsTo
    {
        return $this->belongsTo(PrincipalInvestigator::class, 'reviewer_id');
    }
}
