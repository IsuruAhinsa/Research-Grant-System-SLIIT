<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Disbursement Plan') }}
            </h2>
            <p></p>
        </div>
    </x-slot>

    <div class="mt-6">

        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">

            <div class="md:grid md:grid-cols-3 md:gap-6">

                <div class="md:col-span-1">
                    @include('disbursement-plans.partials.information-table')
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">

                    @include('disbursement-plans.partials.disbursement-form')

                    <div class="inline-block min-w-full py-2 align-middle">

                        @include('disbursement-plans.partials.disbursement-table')

                    </div>

                </div>

            </div>

        </div>

        @if(\App\Models\DisbursementPlan::where('principal_investigator_id', $principalInvestigatorId)->exists())
            <div class="flex justify-end space-x-4 mt-4">
                <a href="{{ route('principal-investigators.dashboard') }}">
                    <x-ui.button>Save & Back to Research Center</x-ui.button>
                </a>
            </div>
        @endif

    </div>

</x-app-layout>
