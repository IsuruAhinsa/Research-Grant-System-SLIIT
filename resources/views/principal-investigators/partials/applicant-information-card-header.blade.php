<div class="flex justify-between items-center px-4 py-5 sm:px-6">
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and applications.</p>
    </div>
    @hasanyrole('Super Administrator|Administrator')
    @if($principalInvestigator->status == "Pending")
        @livewire('principal-investigators.approval', ['principalInvestigator' => $principalInvestigator])
    @endif
    @endhasanyrole

    @hasrole('Dean')
    @if($principalInvestigator->status == "Super Administrator-Approved")
        @livewire('principal-investigators.approval', ['principalInvestigator' => $principalInvestigator])
    @endif
    @endhasrole
</div>
