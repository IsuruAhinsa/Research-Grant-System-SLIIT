<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Disbursement Plan') }}
            </h2>
            <p></p>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl py-10 px-12 my-5 shadow">

        <div>
            <div class="flex justify-center items-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-16">
            </div>
            <div class="text-center">
                <h2 class="text-xl font-semibold leading-7 text-gray-900">Research Grant
                    Handling</h2>
            </div>
        </div>
    </div>

    <div class="space-y-6">

        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">The upper limit of a single granted is
                        Rs.400,000 per year.</h3>
                    <p class="mt-1 text-gray-500">Please follow the category table when creating the disbursement
                        plan.</p>

                    <div class="mt-1 flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="flex-wrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Category
                                            </th>
                                            <th scope="col"
                                                class="flex-wrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Maximum % of Total Grant
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach(\App\Models\DisbursementPlan::categories()->all() as $category)
                                            <tr>
                                                <td class="py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ $category['name'] }}</td>
                                                <td class="px-2 py-2 text-sm font-medium text-gray-900 text-right">
                                                    {{ $category['percentage'] }}%
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('disbursement_plans.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $principalInvestigatorId }}" name="principal_investigator_id">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-ui.label for="month" value="{{ __('Month') }}"/>
                                <x-ui.select id="month" name="month" class="mt-1 block w-full">
                                    <option selected disabled>Select Month</option>
                                    @foreach(\App\Models\DisbursementPlan::months()->all() as $month)
                                        <option value="{{$month['name']}}">{{ $month['name'] }}</option>
                                    @endforeach
                                </x-ui.select>
                                <x-ui.input-error for="month" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-ui.label for="category" value="{{ __('Category') }}"/>
                                <x-ui.select id="category" name="category" class="mt-1 block w-full">
                                    <option selected disabled>Select Category</option>
                                    @foreach(\App\Models\DisbursementPlan::categories()->all() as $category)
                                        <option value="{{$category['name']}}">{{ $category['name'] }}</option>
                                    @endforeach
                                </x-ui.select>
                                <x-ui.input-error for="category" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-ui.label for="activity" value="{{ __('Activity') }}"/>
                                <x-ui.input value="{{ old('activity') }}" id="activity" type="text" name="activity" class="mt-1 block w-full"/>
                                <x-ui.input-error for="activity" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-ui.label for="amount" value="{{ __('Amount') }}"/>
                                <x-ui.input value="{{ old('amount') }}" id="amount" type="text" name="amount" class="mt-1 block w-full"/>
                                <x-ui.input-error for="amount" class="mt-2"/>
                            </div>
                        </div>

                        <div class="flex justify-end my-6">
                            <x-ui.button>Add</x-ui.button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="flex-wrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            Month
                                        </th>
                                        <th scope="col"
                                            class="flex-wrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Category
                                        </th>
                                        <th scope="col"
                                            class="flex-wrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Activity
                                        </th>
                                        <th scope="col"
                                            class="flex-wrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">
                                            Amount
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($disbursement_plans as $disbursement_plan)
                                        <tr>
                                            <td class="py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ $disbursement_plan->month }}</td>
                                            <td class="px-2 py-2 text-sm text-gray-500">
                                                {{ $disbursement_plan->category }}
                                            </td>
                                            <td class="px-2 py-2 text-sm text-gray-500">
                                                {{ $disbursement_plan->activity }}
                                            </td>
                                            <td class="px-2 py-2 text-sm text-gray-500 text-right">
                                                {{ number_format($disbursement_plan->amount, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Total</td>
                                        <td class="px-2 py-2 text-sm font-medium text-gray-900 text-right">{{ number_format($disbursement_plans->sum('amount'), 2) }}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Remaining Balance</td>
                                        <td class="px-2 py-2 text-sm font-medium text-gray-900 text-right">{{ number_format(400000 - $disbursement_plans->sum('amount'), 2) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('disbursement_plans.success') }}">
                <x-ui.button>Save & Finish</x-ui.button>
            </a>
        </div>
    </div>

</x-app-layout>
