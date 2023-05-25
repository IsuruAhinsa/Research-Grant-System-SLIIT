<div class="flow-root mt-6">

    <ul role="list" class="-my-5 divide-y divide-gray-200">

        @forelse($items as $item)

            <li class="py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>

                    </div>
                    <a href="#" class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate hover:underline">{{ $item->grant_number }}</p>
                        <p class="text-sm text-gray-500 truncate">{{ $item->faculty->name }}</p>
                    </a>

                    @livewire('principal-investigators.reviews.review-requests', ['principalInvestigator' => $item])
                </div>
            </li>

        @empty

            <li class="py-4">
                <div class="flex justify-center text-gray-500 text-lg">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                    </svg>

                    {{ request()->status == 'requested' ? __('There are currently no new requests.') : __('Unfortunately, there are currently no approved requests at this time.') }}
                </div>
            </li>

        @endforelse
    </ul>
</div>

