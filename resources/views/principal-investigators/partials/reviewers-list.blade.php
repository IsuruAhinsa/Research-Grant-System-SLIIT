<div>
    <p class="mt-4">Reviewer Feedbacks</p>
    @foreach ($principalInvestigator->reviewers as $reviewer)
        <div class="flex mt-4 justify-between">
            <div class="flex items-center">
            <span class="inline-block h-6 w-6 rounded-full overflow-hidden bg-gray-100">
                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </span>

                <div>
                    <p class="mx-3 mb-0">
                        {{ $reviewer->fullname }}
                    </p>

                    @if($principalInvestigator->isFeedbackSubmitted($reviewer->pivot->user_id))
                        <a href="{{ route('reviewer-feedback.create', ['principalInvestigator' => $principalInvestigator->id, 'reviewerId' => $reviewer->pivot->user_id]) }}" class="ml-3 text-xs text-blue-500 hover:underline">Check Feedback</a>
                    @endif
                </div>

                @if($reviewer->pivot->is_accepted === null)

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 text-warning-500">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                    </svg>

                @elseif($reviewer->pivot->is_accepted)

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 text-success-500">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                    </svg>

                @else

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 text-danger-500">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                    </svg>

                @endif

            </div>

            @unless($reviewer->pivot->is_accepted)
                <div class="bg-red-100 flex items-center p-2 rounded-full text-red-500 hover:cursor-pointer hover:bg-red-300"
                     wire:click.prevent="deleteReviewer({{ $reviewer->pivot->user_id }})">
                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </div>
            @endunless

        </div>

    @endforeach
</div>
