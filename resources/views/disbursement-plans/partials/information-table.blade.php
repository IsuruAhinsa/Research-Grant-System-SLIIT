<h3 class="text-lg font-medium leading-6 text-gray-900">
    The upper limit of a single granted is Rs.{{ number_format(\App\Models\Setting::getSettings()->budget, 2) }} per year.
</h3>

<p class="mt-1 text-gray-500">
    Please follow the uploaded Other Research Document’s Budget page and the list under category table when creating the disbursement plan.
</p>

<div class="mt-1 flex flex-col">
    <div class="inline-block min-w-full align-middle">
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
