<div>
    <dt class="text-sm font-medium text-gray-500">Budget Activity Plan</dt>
    <dd class="mt-1 text-sm text-gray-900">
        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <x-icons.xlsx-icon-svg />
                    <span class="ml-2 flex-1 w-0 truncate"> {{\Illuminate\Support\Str::afterLast($principalInvestigator->budget_activity_plan, '/')}}</span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <a href="{{ route('principal-investigators.downloads.BudgetActivityPlan', $principalInvestigator) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Download </a>
                </div>
            </li>
        </ul>
    </dd>
</div>
