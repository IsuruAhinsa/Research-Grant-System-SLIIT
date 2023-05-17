<x-app-layout>
    <x-slot name="header">
        <div>
{{--            {{ Breadcrumbs::render('principal-investigators.show', $principalInvestigator) }}--}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $principalInvestigator->full_name }}
            </h2>
        </div>
    </x-slot>

    <div class="my-5 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="flex justify-between items-center px-4 py-5 sm:px-6">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and applications.</p>
            </div>
            @unlessrole('Principal Investigator')
                @if($principalInvestigator->status == 'Pending')
                    @livewire('principal-investigators.approval', ['principalInvestigator' => $principalInvestigator])
                @endif
            @endunlessrole
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                @include('principal-investigators.partials.applicant-information')
                <div class="sm:col-span-2 space-y-5">
                    @include('principal-investigators.partials.download-principal-investigator-resume-attachment')

                    @include('principal-investigators.partials.download-research-grant-proposal')

                    @include('principal-investigators.partials.download-budget-activity-plan')

                    @include('principal-investigators.partials.download-co-principal-investigator-resume')

                    @include('principal-investigators.partials.download-research-assistant-resume')
                </div>
            </dl>
        </div>
    </div>
</x-app-layout>
