<x-app-layout>

    <div class="grid min-h-full place-items-center bg-white px-6 py-12 sm:py-12 lg:px-8">

        <div class="text-center">

            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-24 text-green-500">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                </svg>
            </div>

            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">SUCCESS</h1>

            <p class="mt-6 text-xl leading-7 text-gray-600">Thank you for Registering. we'll be in touch via email!</p>

            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('disbursement_plans.create', request()->principal_investigator) }}" class="rounded-md bg-secondary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-secondary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary-600">Create Disbursement Plans</a>

                <a href="{{ route('dashboard') }}" class="rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Go back home</a>
            </div>

        </div>

    </div>

</x-app-layout>
