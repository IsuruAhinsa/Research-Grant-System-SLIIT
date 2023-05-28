@if ($principalInvestigator->isPending())
    <div class="flex items-center">
        <span class="h-8 w-8 rounded-full bg-yellow-400 flex items-center justify-center ring-8 ring-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             class="w-5 h-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
        </svg>
    </span>
        <p class="ml-2 text-warning-500 font-bold">Pending</p>
    </div>
@elseif($principalInvestigator->isApproved())
    <div class="flex items-center">
        <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
             aria-hidden="true">
            <path fill-rule="evenodd"
                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                  clip-rule="evenodd" />
        </svg>
    </span>
        <p class="ml-2 text-success-500 font-bold">Approved</p>
    </div>
@elseif($principalInvestigator->isRejected())
    <div class="flex items-center">
        <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
             stroke="currentColor" class="w-5 h-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </span>
        <p class="ml-2 text-danger-500 font-bold">Rejected</p>
    </div>
@endif
