<x-app-layout>

    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('reports.principal-investigator') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Generate Principal Investigator Reports') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 mt-4">

        <x-ui.validation-errors class="mb-4"/>

        @include('reports.principal-investigator.partials.main-report-generate-form')

    </div>


    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 mt-6">

        <x-ui.validation-errors class="mb-4"/>

        @include('reports.principal-investigator.partials.history-report-generate-form')

    </div>

</x-app-layout>
