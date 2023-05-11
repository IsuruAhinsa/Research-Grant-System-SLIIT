<x-app-layout>

    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('downloads.index') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Downloads') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl py-10 px-12 my-5 shadow">
        <dt class="text-sm font-medium leading-6 text-gray-900">Attachments</dt>
        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2">
            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                    <div class="flex w-0 flex-1 items-center">
                        <x-icons.doc-icon-svg/>
                        <div class="ml-4 flex min-w-0 flex-1 space-x-2">
                                        <span
                                            class="truncate font-medium">Research Proposal Application Form.docx</span>
                            <span class="flex-shrink-0 text-gray-400">{{ $research_proposal_application_size }}</span>
                        </div>
                    </div>
                    <div class="mr-4 flex-shrink-0">
                        <a href="{{ route('downloads.research_proposal_application_form') }}"
                           class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                    </div>
                </li>
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                    <div class="flex w-0 flex-1 items-center">
                        <x-icons.xlsx-icon-svg/>
                        <div class="ml-4 flex min-w-0 flex-1 space-x-2">
                            <span class="truncate font-medium">Other Research Documents.xlsx</span>
                            <span class="flex-shrink-0 text-gray-400">
                                            {{ $other_research_document_size }}
                                        </span>
                        </div>
                    </div>
                    <div class="mr-4 flex-shrink-0">
                        <a href="{{ route('downloads.other_research_documents') }}"
                           class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                    </div>
                </li>
            </ul>
        </dd>
    </div>
</x-app-layout>
