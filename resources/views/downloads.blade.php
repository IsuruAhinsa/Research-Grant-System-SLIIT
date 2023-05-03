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
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             class="h-5 w-5 flex-shrink-0 text-gray-400"
                             viewBox="0 0 48 48">
                            <path fill="#2d92d4"
                                  d="M42.256,6H15.744C14.781,6,14,6.781,14,7.744v7.259h30V7.744C44,6.781,43.219,6,42.256,6z"></path>
                            <path fill="#2150a9"
                                  d="M14,33.054v7.202C14,41.219,14.781,42,15.743,42h26.513C43.219,42,44,41.219,44,40.256v-7.202H14z"></path>
                            <path fill="#2d83d4" d="M14 15.003H44V24.005000000000003H14z"></path>
                            <path fill="#2e70c9" d="M14 24.005H44V33.055H14z"></path>
                            <path fill="#00488d"
                                  d="M22.319,34H5.681C4.753,34,4,33.247,4,32.319V15.681C4,14.753,4.753,14,5.681,14h16.638 C23.247,14,24,14.753,24,15.681v16.638C24,33.247,23.247,34,22.319,34z"></path>
                            <path fill="#fff"
                                  d="M18.403 19L16.857 26.264 15.144 19 12.957 19 11.19 26.489 9.597 19 7.641 19 9.985 29 12.337 29 14.05 21.311 15.764 29 18.015 29 20.359 19z"></path>
                        </svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             class="h-5 w-5 flex-shrink-0 text-gray-400"
                             viewBox="0 0 48 48">
                            <path fill="#169154"
                                  d="M29,6H15.744C14.781,6,14,6.781,14,7.744v7.259h15V6z"></path>
                            <path fill="#18482a"
                                  d="M14,33.054v7.202C14,41.219,14.781,42,15.743,42H29v-8.946H14z"></path>
                            <path fill="#0c8045" d="M14 15.003H29V24.005000000000003H14z"></path>
                            <path fill="#17472a" d="M14 24.005H29V33.055H14z"></path>
                            <g>
                                <path fill="#29c27f"
                                      d="M42.256,6H29v9.003h15V7.744C44,6.781,43.219,6,42.256,6z"></path>
                                <path fill="#27663f"
                                      d="M29,33.054V42h13.257C43.219,42,44,41.219,44,40.257v-7.202H29z"></path>
                                <path fill="#19ac65" d="M29 15.003H44V24.005000000000003H29z"></path>
                                <path fill="#129652" d="M29 24.005H44V33.055H29z"></path>
                            </g>
                            <path fill="#0c7238"
                                  d="M22.319,34H5.681C4.753,34,4,33.247,4,32.319V15.681C4,14.753,4.753,14,5.681,14h16.638 C23.247,14,24,14.753,24,15.681v16.638C24,33.247,23.247,34,22.319,34z"></path>
                            <path fill="#fff"
                                  d="M9.807 19L12.193 19 14.129 22.754 16.175 19 18.404 19 15.333 24 18.474 29 16.123 29 14.013 25.07 11.912 29 9.526 29 12.719 23.982z"></path>
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 space-x-2">
                            <span class="truncate font-medium">Other Research Documents.xlsx</span>
                            <span class="flex-shrink-0 text-gray-400">
                                            {{ $other_research_document_size }}
                                        </span>
                        </div>
                    </div>
                    <div class="mr-4 flex-shrink-0">
                        <a href="{{ route('downloads.other_research_documents') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                    </div>
                </li>
            </ul>
        </dd>
    </div>
</x-app-layout>
