<div class="bg-gray-50 px-8 sm:pr-6 lg:border-l lg:border-gray-200">
    <div class="lg:w-80">
        <div class="pt-6 pb-2">
            <h2 class="font-semibold">Activity Center</h2>
        </div>
        <div>
            <ul class="py-4 text-sm" role="list">
                @if($principal_investigator && $principal_investigator->is_agreed)
                    <li>
                        <a href="{{ route('monthly-progress.index', $principal_investigator) }}" class="flex items-center text-indigo-600 font-semibold hover:text-indigo-900 hover:underline">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                            </svg>

                            Monthly Progress
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
