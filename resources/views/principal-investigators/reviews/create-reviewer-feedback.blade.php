<div>

    <x-slot name="header">
        <div class="flex items-center space-x-2">
            <div>
                <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-pink-500">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </span>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Evaluation Report of Research Proposal for Funding.') }}
                </h2>
                <p class="text-gray-500">
                    The evaluation report reviews a research proposal to see if it deserves funding, helping funding agencies decide how to allocate resources.
                </p>
            </div>
        </div>
    </x-slot>

    <form class="mt-5" wire:submit.prevent="saveReviewerComment">
        {{ $this->form }}

        <div class="mt-3">
            <x-ui.button>Submit Feedback</x-ui.button>
        </div>
    </form>

</div>
