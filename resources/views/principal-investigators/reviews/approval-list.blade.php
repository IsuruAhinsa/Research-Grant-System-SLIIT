<div>
    <div class="flow-root mt-6">
        <ul role="list" class="-my-5 divide-y divide-gray-200">
            @foreach(Auth::user()->principal_investigators as $application)
                <li class="py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>

                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $application->grant_number }}</p>
                            <p class="text-sm text-gray-500 truncate">{{ $application->faculty->name }}</p>
                        </div>
                        <div>
                            <a href="#"
                               class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                Approve </a>

                            <a href="#"
                               class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-red-500 text-sm leading-5 font-medium rounded-full text-white bg-red-500 hover:bg-red-600">
                                Reject </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

