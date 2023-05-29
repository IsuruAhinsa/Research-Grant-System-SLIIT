<div>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('monthly-progress.index', $principal_investigator) }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Research Grants Progress Reports
            </h2>
        </div>
    </x-slot>

    <div class="mt-6">

        <a class="flex justify-end my-4" href="{{ route('monthly-progress.create', $principal_investigator) }}">
            <x-ui.button>Create Monthly Progress</x-ui.button>
        </a>

        {{ $this->table }}
    </div>

</div>
