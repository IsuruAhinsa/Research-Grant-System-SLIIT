<?php

namespace App\Http\Livewire\PrincipalInvestigators\Reviews;

use App\Models\PrincipalInvestigator;
use App\Models\ReviewerFeedback;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateReviewerFeedback extends Component implements HasForms
{
    use InteractsWithForms;

    public $principal_investigator_id, $reviewer_id;

    public $objectives_clarity, $objectives_realistic, $objectives_achievable, $objectives_comments;

    public $contribution_beyond, $contribution_state_of_affairs, $contribution_references, $contribution_comments;

    public $approach_concept, $approach_transitions, $approach_references, $approach_methodology, $approach_comments;

    public $impact_technology, $impact_knowledge, $impact_economic, $impact_social, $impact_other, $impact_comments, $impact_dissemination_plan;

    public $work_plan_structure, $work_plan_details, $work_plan_approaches_activities, $work_plan_timing, $work_plan_comments;

    public $budget_realistic, $budget_disbursement_plan, $budget_expected_outcomes, $budget_comments;

    public $resource_capacity_lead, $resource_background_co_investigators, $resource_infrastructure_institutions, $resource_capable_proposers, $resource_comments;

    public $overall_strong, $overall_recommendation, $overall_comments;

    public $suggestions;

    public $optionArray = [
        1 => 'Poor',
        2 => 'Satisfactory',
        3 => 'Average',
        4 => 'Good',
        5 => 'Excellent',
    ];

    public function mount($principalInvestigator): void
    {
        $this->principal_investigator_id = $principalInvestigator;
        $this->reviewer_id = auth()->id();

        $feedback = ReviewerFeedback::where('principal_investigator_id', $principalInvestigator)
            ->where('reviewer_id', auth()->id())->first();

        if ($feedback) {
            $this->form->fill([
                'principal_investigator_id' => $principalInvestigator,
                'reviewer_id' => Auth::id(),
                'objectives_clarity' => $feedback->objectives_clarity,
                'objectives_realistic' => $feedback->objectives_realistic,
                'objectives_achievable' => $feedback->objectives_achievable,
                'objectives_comments' => $feedback->objectives_comments,
                // 1.2	Contribution
                'contribution_beyond' => $feedback->contribution_beyond,
                'contribution_state_of_affairs' => $feedback->contribution_state_of_affairs,
                'contribution_references' => $feedback->contribution_references,
                'contribution_comments' => $feedback->contribution_comments,
                // 1.3	Approach
                'approach_concept' => $feedback->approach_concept,
                'approach_transitions' => $feedback->approach_transitions,
                'approach_references' => $feedback->approach_references,
                'approach_methodology' => $feedback->approach_methodology,
                'approach_comments' => $feedback->approach_comments,
                // 2.1 Impact of project outcomes
                'impact_technology' => $feedback->impact_technology,
                'impact_knowledge' => $feedback->impact_knowledge,
                'impact_economic' => $feedback->impact_economic,
                'impact_social' => $feedback->impact_social,
                'impact_other' => $feedback->impact_other,
                'impact_comments' => $feedback->impact_comments,
                // 2.2 Dissemination of outcomes
                'impact_dissemination_plan' => $feedback->impact_dissemination_plan,
                // 3. Work Plan
                'work_plan_structure' => $feedback->work_plan_structure,
                'work_plan_details' => $feedback->work_plan_details,
                'work_plan_approaches_activities' => $feedback->work_plan_approaches_activities,
                'work_plan_timing' => $feedback->work_plan_timing,
                'work_plan_comments' => $feedback->work_plan_comments,
                // 4. Budget
                'budget_realistic' => $feedback->budget_realistic,
                'budget_disbursement_plan' => $feedback->budget_disbursement_plan,
                'budget_expected_outcomes' => $feedback->budget_expected_outcomes,
                'budget_comments' => $feedback->budget_comments,
                // 5. Availability of Resource
                'resource_capacity_lead' => $feedback->resource_capacity_lead,
                'resource_background_co_investigators' => $feedback->resource_background_co_investigators,
                'resource_infrastructure_institutions' => $feedback->resource_infrastructure_institutions,
                'resource_capable_proposers' => $feedback->resource_capable_proposers,
                'resource_comments' => $feedback->resource_comments,
                // 6. Overall Evaluation and Recommendations
                'overall_strong' => $feedback->overall_strong,
                'overall_recommendation' => $feedback->overall_recommendation,
                'overall_comments' => $feedback->overall_comments,
                // 7. Suggestions to Proposers
                'suggestions' => $feedback->suggestions,
            ]);
        }

    }

    protected function getFormSchema(): array
    {
        return [
            // 1.1	Objectives
            Section::make('1. Merit')
                ->columns(2)
                ->disabled($this->isExistsRecord())
                ->collapsible()
                ->description('1.1 Objectives')
                ->schema([

                    Hidden::make('principal_investigator_id'),

                    Hidden::make('reviewer_id'),

                    Radio::make('objectives_clarity')
                        ->label('(A). Are objectives of the project proposal clear and concise?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('objectives_realistic')
                        ->label('(B). Are objectives of the project proposal realistic and measurable?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('objectives_achievable')
                        ->label('(C). Are objectives of the project proposal achievable during the project period?')
                        ->required()
                        ->options($this->optionArray),

                    Textarea::make('objectives_comments')
                        ->label('(D). Comments')
                        ->nullable()
                ]),
            // 1.2	Contribution
            Section::make('1. Merit')
                ->columns(2)
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->description('1.2 Contribution')
                ->schema([

                    Radio::make('contribution_beyond')
                        ->label('(A). Would this project contribute beyond the state-of-the-art?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('contribution_state_of_affairs')
                        ->label('(B). Have the proposers indicated the current state of affairs, products and services available and how their objectives and proposed work will deliver outcomes beyond the state-of-the-art?  ')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('contribution_references')
                        ->label('(C). If your response to above question is Average or above, please indicate whether the proposers have supported their claims adequately by references?')
                        ->required()
                        ->options($this->optionArray),

                    Textarea::make('contribution_comments')
                        ->label('(D). Comments')
                        ->nullable()
                ]),
            // 1.3	Approach
            Section::make('1. Merit')
                ->columns(2)
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->description('1.3 Approach')
                ->schema([

                    Radio::make('approach_concept')
                        ->label('(A). Has the overall concept behind the proposed project been described adequately and clearly?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('approach_transitions')
                        ->label('(B). Have the proposers indicated the transitions stages associated with the project outcome (e.g. idea to an application, application to a product, product commercialization etc.)?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('approach_references')
                        ->label('(C). Have the proposers described clearly indicating all references, the external research findings and knowledge that becomes inputs to their project?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('approach_methodology')
                        ->label('(D). Have the proposers described and explained clearly overall approach and methodology and their salient features?')
                        ->required()
                        ->options($this->optionArray),

                    Textarea::make('approach_comments')
                        ->label('(E). Comments')
                        ->columnSpan(2)
                        ->nullable()
                        ->placeholder('Please indicate strengths and weaknesses of the approach according to your opinion.')
                ]),
            // 2.1 Impact of project outcomes
            Section::make('2. Impact')
                ->columns(2)
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->description('2.1 Impact of project outcomes')
                ->schema([

                    Radio::make('impact_technology')
                        ->label('(A). Does the proposed project have potential to produce an impact on technology advancement?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('impact_knowledge')
                        ->label('(B). Does the proposed project have potential to produce an impact on new knowledge integration?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('impact_economic')
                        ->label('(C). Does the proposed project have potential to produce an impact on Economic development?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('impact_social')
                        ->label('(D). Does the proposed project have potential to produce an impact on Social and environmental improvement and sustainability?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('impact_other')
                        ->label('(E). Does the proposed project have potential to produce an impact on any other domain?')
                        ->required()
                        ->options($this->optionArray),

                    Textarea::make('impact_comments')
                        ->label('(F). Comments')
                        ->nullable()
                        ->placeholder('Please indicate your assessment of overall impact. Also indicate domain other than the ones listed above, in which this project has the potential to produce an impact if there are any')
                ]),
            // 2.2 Dissemination of outcomes
            Section::make('2. Impact')
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->description('2.2 Dissemination of outcomes')
                ->schema([

                    Radio::make('impact_dissemination_plan')
                        ->label('(A). Have the proposers presented a clear and practical plan for the dissemination of their project outcomes?')
                        ->required()
                        ->options($this->optionArray),
                ]),
            // 3. Work Plan
            Section::make('3. Work Plan')
                ->columns(2)
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->schema([

                    Radio::make('work_plan_structure')
                        ->label('(A). Have the proposers clearly and adequately described overall structure of their work plan highlighting major components and the Inter-relation among them?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('work_plan_details')
                        ->label('(B). Have the proposers given the details including approaches, activities and justification of each major component?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('work_plan_approaches_activities')
                        ->label('(C). Are the proposed approaches and activities sound enough to deliver expected outcomes?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('work_plan_timing')
                        ->label('(D). Have the proposers given realistic and acceptable timing of each major component, significant milestones and expected final outcomes of each major component (in the form of a Gantt chart or any other acceptable form)?')
                        ->required()
                        ->options($this->optionArray),

                    Textarea::make('work_plan_comments')
                        ->label('(E). Comments')
                        ->columnSpan(2)
                        ->nullable()
                ]),
            // 4. Budget
            Section::make('4. Budget')
                ->columns(2)
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->schema([

                    Radio::make('budget_realistic')
                        ->label('(A). Have the proposers given realistic budgets for each major components with acceptable justifications?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('budget_disbursement_plan')
                        ->label('(B). Is the Disbursement plan acceptable?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('budget_expected_outcomes')
                        ->label('(C). Could the expected outcomes justify the budget?')
                        ->required()
                        ->options($this->optionArray),

                    Textarea::make('budget_comments')
                        ->label('(D). Comments')
                        ->nullable()
                ]),
            // 5. Availability of Resource
            Section::make('5. Availability of Resource')
                ->columns(2)
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->schema([

                    Radio::make('resource_capacity_lead')
                        ->label('(A). Does the principal investigator have the capacity (domain knowledge and experience) to lead the project team? ')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('resource_background_co_investigators')
                        ->label('(B). Do the co-investigators have appropriate backgrounds to contribute to achieve the project objectives?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('resource_infrastructure_institutions')
                        ->label('(C). Do the institutions proposers are attached to have suitable and adequate infrastructure to support the proposed project?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('resource_capable_proposers')
                        ->label('(D). In your opinion, are the proposers capable of successfully delivering the expected project outcomes?')
                        ->required()
                        ->options($this->optionArray),

                    Textarea::make('resource_comments')
                        ->label('(E). Comments')
                        ->columnSpan(2)
                        ->nullable()
                ]),
            // 6. Overall Evaluation and Recommendations
            Section::make('6. Overall Evaluation and Recommendations')
                ->columns(2)
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->schema([

                    Radio::make('overall_strong')
                        ->label('(A). Overall, is this a strong proposal?')
                        ->required()
                        ->options($this->optionArray),

                    Radio::make('overall_recommendation')
                        ->label('(B). Recommendation for funding this proposal')
                        ->required()
                        ->options([
                            1 => 'Not worth funding',
                            2 => 'Requires major modifications',
                            3 => 'Recommended with minor modifications',
                            4 => 'Recommended',
                            5 => 'Strongly recommended',
                        ]),

                    Textarea::make('overall_comments')
                        ->label('(C). Comments')
                        ->nullable()
                        ->columnSpan(2)
                        ->placeholder('Among others please indicate modifications required in case your response is Requires major modifications or Recommended with minor modifications to above question')
                ]),
            // 7. Suggestions to Proposers
            Section::make('7. Suggestions to Proposers')
                ->collapsible()
                ->disabled($this->isExistsRecord())
                ->schema([

                    Textarea::make('suggestions')
                        ->nullable()
                        ->label('Suggestions to Proposers (if any)')
                ]),
        ];
    }

    public function saveReviewerComment()
    {
        if (!$this->isExistsRecord()) {
            // Record does not exist, create a new one
            ReviewerFeedback::create($this->form->getState());

            // create reviewer status
            $this->setReviewerStatus();

            return redirect()->route('principal-investigators.show', $this->principal_investigator_id)->with([
                Notification::make()
                    ->title('Feedback Submitted')
                    ->body('Thank you for your feedback!')
                    ->success()
                    ->send()
            ]);
        }
    }

    public function isExistsRecord(): bool
    {
        return ReviewerFeedback::where('reviewer_id', auth()->id())
            ->where('principal_investigator_id', $this->principal_investigator_id)
            ->exists();
    }

    public function setReviewerStatus(): void
    {
        if ($this->overall_strong > 3) {
            PrincipalInvestigator::find($this->principal_investigator_id)
                ->statuses()
                ->create([
                    'user_id' => auth()->id(),
                    'name' => 'REVIEWER-APPROVED',
                ]);
        } else {
            PrincipalInvestigator::find($this->principal_investigator_id)
                ->statuses()
                ->create([
                    'user_id' => auth()->id(),
                    'name' => 'REVIEWER-REJECTED',
                ]);
        }
    }

    public function render()
    {
        return view('principal-investigators.reviews.create-reviewer-feedback');
    }
}
