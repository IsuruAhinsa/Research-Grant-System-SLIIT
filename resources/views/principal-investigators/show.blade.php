<x-app-layout>
    <x-slot name="header">
        <div>
            {{--            {{ Breadcrumbs::render('principal-investigators.show', $principalInvestigator) }}--}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @hasanyrole('Super Administrator|Administrator')
                {{ $principalInvestigator->full_name }}
                @else
                    @isset($principalInvestigator->grant_number)
                        {{ $principalInvestigator->grant_number }}
                    @endisset
                @endhasanyrole
                    {{-- TODO: display breadcrumbs --}}
            </h2>
        </div>
    </x-slot>

    @hasrole('Principal Investigator')
        @if($principalInvestigator->user_id != Auth::id())
            @include('principal-investigators.partials.dashboard-actions')
        @endif
    @endhasrole

    <div class="mt-4 max-w-3xl mx-auto grid grid-cols-1 gap-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">

        <div class="space-y-6 lg:col-start-1 lg:col-span-2">

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">

                @include('principal-investigators.partials.applicant-information-card-header')

                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">

                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                        @include('principal-investigators.partials.applicant-information')

                        <div class="sm:col-span-2 space-y-5">

                            @if($principalInvestigator->user_id == Auth::id())
                                @unlessrole('Dean')
                                    @include('principal-investigators.partials.download-principal-investigator-resume-attachment')
                                @endunlessrole
                            @endif

                            @include('principal-investigators.partials.download-research-grant-proposal')

                            @include('principal-investigators.partials.download-budget-activity-plan')

                            @if($principalInvestigator->user_id == Auth::id())
                                @unlessrole('Dean')
                                    @include('principal-investigators.partials.download-co-principal-investigator-resume')

                                    @include('principal-investigators.partials.download-research-assistant-resume')
                                @endunlessrole
                            @endif

                        </div>

                    </dl>

                </div>

            </div>

        </div>

        <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1 space-y-6">
            @hasrole('Dean')
            @if($principalInvestigator->status == "DEAN-APPROVED")
                @livewire('principal-investigators.reviewer-create', ['principalInvestigator' => $principalInvestigator])
            @endif
            @endhasrole

            @include('principal-investigators.partials.status-history-card')
        </section>

    </div>
</x-app-layout>
