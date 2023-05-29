<div>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('monthly-progress.create', $principal_investigator) }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Research Grants Progress Report
            </h2>
        </div>
    </x-slot>

    <div class="min-h-full flex mt-4">
        <div class="w-full max-w-full mx-auto">
            <div class="min-w-0 bg-white p-8 rounded-lg shadow">
                <form wire:submit.prevent="saveMonthlyProgress">
                    {{ $this->form }}

                    <div class="mt-4 flex justify-end">
                        <x-ui.button>Add Monthly Progress</x-ui.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
