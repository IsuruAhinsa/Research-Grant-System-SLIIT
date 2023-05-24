<div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Add Reviewers</h2>
    <form class="row" wire:submit.prevent="saveReviewer">
        <div class="mt-6 flow-root">
            {{ $this->form }}
        </div>

        <div class="mt-6 flex flex-col justify-stretch">
            <button type="submit"
                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Assign Reviewers
            </button>
        </div>
    </form>

    @foreach($principalInvestigator->users as $user)
            <div class="flex mt-4">
            <span class="inline-block h-6 w-6 rounded-full overflow-hidden bg-gray-100">
  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
    <path
        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
  </svg>
</span>

        <p class="ml-3">{{ $user->fullname }}</p>
            </div>
    @endforeach

</div>

