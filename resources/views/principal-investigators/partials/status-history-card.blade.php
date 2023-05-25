<div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Timeline</h2>

    <div class="mt-6 flow-root">
        <ul role="list" class="-mb-8">
            @foreach ($principalInvestigator->statuses->sortBy('id') as $status)
{{-- TODO: display username approved or rejected using user_id
       TODO: hide other status for pi (only show approved, rejected, pending)
   --}}
                <li>
                    <div class="relative pb-8">

                        @if ($loop->count != 1 && !$loop->last)
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                  aria-hidden="true"></span>
                        @endif

                        <div class="relative flex space-x-3">
                            <div>

                                @if ($status->name == 'PENDING')

                                    <span
                                        class="h-8 w-8 rounded-full bg-yellow-400 flex items-center justify-center ring-8 ring-white">
                                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                              stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3"/>
                                    </svg>

                                    </span>

                                @elseif(str_contains($status->name, 'APPROVED'))

                                    <span
                                        class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    </span>

                                @elseif(str_contains($status->name, 'REJECTED'))

                                    <span
                                        class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    </span>


                                @endif
                            </div>

                            <div class="min-w-0 pt-1.5 flex space-x-4">

                                <div>
                                    <x-ui.badge>{{ $status->name }}</x-ui.badge>

                                    <div class="text-xs whitespace-nowrap text-gray-500 mt-1 ml-1">
                                        <time datetime="2020-09-20">{{ $status->created_at->toDateString() }}</time>
                                    </div>

                                    @if(str_contains($status->name, 'REJECTED'))
                                        <small class="flex text-red-500 mt-1 ml-1">{{ $status->reason }}</small>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
