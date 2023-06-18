<x-app-layout>

    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('reports.financial') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Generate Financial Reports') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 mt-4">

        <x-ui.validation-errors class="mb-4"/>

        <form action="{{ route('reports.export.financial') }}">
            @csrf
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <x-ui.label for="principal_investigator" value="{{ __('Principal Investigator') }}"/>
                    <x-ui.select id="principal_investigator" name="principal_investigator" class="mt-1 block w-full">
                        @if(\App\Models\PrincipalInvestigator::exists())
                            <option selected value="all">All Principal Investigators</option>
                        @endif
                        @forelse(\App\Models\PrincipalInvestigator::all() as $principal_investigator)
                            <option value="{{ $principal_investigator->id }}">{{ $principal_investigator->full_name }}</option>
                        @empty
                            <option selected disabled>No Principal Investigators...</option>
                        @endforelse
                    </x-ui.select>
                </div>

                <div>
                    <x-ui.label for="from" value="{{ __('From') }}"/>
                    <x-ui.input type="date" name="from" class="mt-1 block w-full"/>
                </div>

                <div>
                    <x-ui.label for="to" value="{{ __('To') }}"/>
                    <x-ui.input type="date" name="to" class="mt-1 block w-full"/>
                </div>
            </div>

            <div class="mt-4">
                <x-ui.button class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                    </svg>
                    Generate Report and Download
                </x-ui.button>
            </div>
        </form>
    </div>

</x-app-layout>
