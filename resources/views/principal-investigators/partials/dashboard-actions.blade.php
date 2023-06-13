<div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-5 sm:px-6 mt-4">
    <div class="max-w-full">

        <h2 class="text-lg font-medium text-gray-900">Reviewer Feedback and Evaluation Summary for Research Study</h2>

        <p class="mt-1 text-sm text-gray-500">This section provides an overview of the reviewer feedback and evaluation
            results for the research . The feedback and evaluation process aimed to assess the quality, methodology, and
            significance of the study's findings. The reviewers were selected based on their expertise in the subject
            matter and their ability to provide constructive criticism and suggestions for improvement. This summary
            presents a comprehensive analysis of the feedback received, highlighting the strengths and weaknesses
            identified by the reviewers. The evaluation outcome serves as a valuable resource for the researchers to
            enhance the study's quality and address any areas of concern before finalizing the research findings.</p>

        <ul role="list" class="mt-6 border-t even:border-b border-gray-200 divide-y divide-gray-200">

            @if ($principalInvestigator->isReviewer())
                <li>
                    <div class="relative group py-4 flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-pink-500">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                            </span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-sm font-medium text-gray-900">
                                <a href="{{ route('reviewer-feedback.create', $principalInvestigator->id) }}">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    {{ $principalInvestigator->isFeedbackSubmitted(auth()->id()) ? __('Review Feedback') : __('Submit Feedback') }}
                                    @if ($principalInvestigator->isFeedbackSubmitted(auth()->id()))
                                        <x-ui.badge class="ml-2">
                                            Feedback Submitted
                                        </x-ui.badge>
                                    @endif
                                </a>
                            </div>
                            <p class="text-sm text-gray-500">Evaluation Report of Research Proposal for Funding.</p>
                        </div>
                        <div class="flex-shrink-0 self-center">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </li>
            @endif

            @unless ($principalInvestigator->isReviewer())
                <li>
                    <div class="relative group py-4 flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-purple-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                                </svg>
                            </span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-sm font-medium text-gray-900">
                                <a href="{{ route('monthly-progress.index', $principalInvestigator) }}">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Monthly Progress
                                </a>
                            </div>
                            <p class="text-sm text-gray-500">
                                Every month, researchers provide updates on the progress of their research project. These
                                updates include details about the tasks completed, data collected, analysis findings, and
                                any challenges faced.
                            </p>
                        </div>
                        <div class="flex-shrink-0 self-center">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </li>
            @endunless

            @hasanyrole('Super Administrator|Administrator|Dean|Principal Investigator')
                @unless($principalInvestigator->isReviewer())
                    <li>
                        <div class="relative group py-4 flex items-start space-x-3">
                            <div class="flex-shrink-0">
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-yellow-500">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="{{ route('disbursement_plans.payments', $principalInvestigator) }}">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Disbursement Plan
                                    </a>
                                </div>
                                <p class="text-sm text-gray-500">
                                    The research disbursement plan efficiently allocates funds based on the project's budget and goals. Resources will be distributed to personnel, equipment, supplies, and travel expenses, ensuring transparency and maximizing the research's impact.
                                </p>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </li>
                @endunless
            @endhasanyrole
        </ul>
    </div>
</div>
