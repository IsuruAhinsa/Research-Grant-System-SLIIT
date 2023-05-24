<div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Add Reviewers</h2>
    <form class="row" wire:submit.prevent="saveReviewer">
        <div class="mt-6 flow-root">
            {{ $this->form }}
        </div>

        <div class="mt-6 flex flex-col justify-stretch">
{{--    TODO: add loading state to submit button    --}}
            <button type="submit"
                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Assign Reviewers
            </button>
        </div>
    </form>

    @include('principal-investigators.partials.reviewers-list')

</div>

