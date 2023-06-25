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
                Amount (LKR.)
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
            <td colspan="3"
                class="py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Total
            </td>
            <td class="px-2 py-2 text-sm font-medium text-gray-900 text-right">LKR. {{ number_format($disbursement_plans->sum('amount'), 2) }}</td>
        </tr>

        <tr>
            <td colspan="3"
                class="py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Remaining
                Balance
            </td>
            <td class="px-2 py-2 text-sm font-medium text-gray-900 text-right">LKR. {{ number_format(\App\Models\Setting::getSettings()->budget - $disbursement_plans->sum('amount'), 2) }}</td>
        </tr>
        </tbody>
    </table>
</div>
