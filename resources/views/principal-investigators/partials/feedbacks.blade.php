<div class="mt-10">
    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Reviewer Feedbacks</h3>
    <ul role="list" class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
        @foreach ($proposal->reviewerFeedbacks as $feedback)
            <li>
                <a href="{{ route('reviewer-feedback.create', ['principalInvestigator' => $proposal->id, 'reviewerId' => $feedback->reviewer_id]) }}"
                    class="relative group p-2 w-full flex items-center justify-between rounded-full border border-gray-300 shadow-sm space-x-3 text-left hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="min-w-0 flex-1 flex items-center space-x-3">
                        <span class="block flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-orange-500">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                            </span>
                        </span>
                        <span class="block min-w-0 flex-1">
                            <span class="block text-sm font-medium text-gray-900 truncate">Feedback
                                {{ $loop->iteration }}</span>
                            <span class="block text-sm font-medium text-gray-500 truncate">
                                @if($feedback->overall_strong > 3)
                                    Approved
                                @else
                                    Rejected
                                @endif
                            </span>
                        </span>
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
