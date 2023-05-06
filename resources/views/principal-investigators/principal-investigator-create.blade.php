<div>

    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('principal-investigators.create') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload New Research Proposal Documents') }}
            </h2>
            <p></p>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl py-10 px-12 my-5 shadow">

        <div>
            <div class="flex justify-center items-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-16">
            </div>
            <div class="text-center">
                <h2 class="text-xl font-semibold leading-7 text-gray-900">Research Grant
                    Handling</h2>
                <p class="text-sm leading-6 text-gray-600">Fill the research grant details using
                    correct details.</p>
            </div>
        </div>
    </div>

    <form class="row" wire:submit.prevent="savePrincipalInvestigator">
        <div class="relative w-full sm:max-w-half sm:flex-half space-y-4 bg-white p-5 rounded-lg">
            {{ $this->form }}
        </div>
    </form>

</div>
