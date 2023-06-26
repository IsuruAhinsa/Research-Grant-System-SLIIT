@if($principal_investigator->isApproved())

    @unless($principal_investigator->is_ban)
        @livewire('principal-investigators.agreement', ['principalInvestigator' => $principal_investigator])
    @endunless

@elseif($principal_investigator->isRejected())

    @include('principal-investigators.partials.decline-message')

@endif

@if($principal_investigator->is_ban)
    @include('monthly-progress.partials.monthly-progress-decline-message', ['principalInvestigator' => $principal_investigator])
@endif

@includeWhen($all_payments_settled, 'disbursement-plans.partials.payment-settled-success-message')

@includeWhen($principal_investigator->is_completed, 'principal-investigators.partials.completed-message')


