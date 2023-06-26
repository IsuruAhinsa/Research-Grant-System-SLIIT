<div class="p-6 lg:p-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Next Transactions</h1>
        </div>
    </div>
    <div class="mt-4 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden ring-1 ring-black ring-opacity-5 md:rounded-lg border">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Principal Investigator
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Category
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Month
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Activity
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Amount
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Remaining Amount
                            </th>
                            <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($payments as $payment)
                            <tr>
                                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                    {{ \App\Models\PrincipalInvestigator::find($payment->principal_investigator_id)->full_name }}
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                    {{ $payment->category }}
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                                    {{ $payment->month }}
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    {{ $payment->activity }}
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    LKR {{ number_format($payment->amount, 2) }}
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-red-500 font-bold">
                                    LKR {{ number_format($payment->remainingAmount, 2) }}
                                </td>
                                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="{{ route('disbursement_plans.payments', $payment->principal_investigator_id) }}"
                                       class="text-indigo-600 hover:text-indigo-900">Show</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center text-gray-500">
                                <td colspan="7">No records</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
