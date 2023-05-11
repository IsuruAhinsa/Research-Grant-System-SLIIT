<div>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('reviewers.create') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Reviewer') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl py-10 px-12 my-5 shadow lg:max-w-3xl lg:mx-auto">

        <form wire:submit.prevent="saveReviewer">
            {{ $this->form }}
            <div class="flex flex-row justify-end space-x-4 py-4">
                <x-ui.secondary-button>
                    Nevermind
                </x-ui.secondary-button>

                <x-ui.button type="submit">
                    {{ __('Create Reviewer') }}
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
