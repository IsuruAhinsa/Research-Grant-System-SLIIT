<div class="mt-4">
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">Total Principal Investigators</dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $totalPrincipalInvestigators }}</dd>
        </div>

        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">Completed Research</dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $totalCompletedResearch }}</dd>
        </div>

        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">Total Research</dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $totalResearch }}</dd>
        </div>

        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">Total Expenses</dt>
            <dd class="mt-1 text-3xl font-semibold text-red-500">LKR. {{ number_format($totalExpenses, 2) }}</dd>
        </div>

        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">Total Requested Claim</dt>
            <dd class="mt-1 text-3xl font-semibold text-green-500">LKR. {{ number_format($totalRequestedClaim, 2) }}</dd>
        </div>
    </dl>
</div>
