<div>
    <x-slot name="header">
        <div>
            @role('Principal Investigator')
            {{ Breadcrumbs::render('monthly-progress.index', $principalInvestigator) }}
            @endrole
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Research Grants Progress Reports
            </h2>
        </div>
    </x-slot>

    <div class="mt-6">

        @role('Principal Investigator')
            @if($principalInvestigator->progresses()->exists())
                @if($principalInvestigator->isMonthlyProgressGraded())
                    @unless($principalInvestigator->is_ban)
                        <a class="flex justify-end my-4" href="{{ route('monthly-progress.create', $principalInvestigator) }}">
                            <x-ui.button>Create Monthly Progress</x-ui.button>
                        </a>
                    @endunless
                @endif

                @if($principalInvestigator->is_ban)
                    @include('monthly-progress.partials.monthly-progress-decline-message')
                @endif
            @endif
        @endrole

        {{ $this->table }}

    </div>

</div>
