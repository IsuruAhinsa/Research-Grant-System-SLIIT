<x-app-layout>
    <x-slot name="header">
        <div>
{{--            {{ Breadcrumbs::render('principal-investigators.show', $principalInvestigator) }}--}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $principalInvestigator->full_name }}
            </h2>
        </div>
    </x-slot>

    <div class="my-5 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="flex justify-between items-center px-4 py-5 sm:px-6">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and applications.</p>
            </div>
            @include('principal-investigators.approval')
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->full_name }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Application for</dt>
                    <dd class="mt-1 text-sm text-gray-900">Backend Developer</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->email }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->phone }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Research Title</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->research_title }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Faculty</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ \App\Models\Faculty::where('id',$principalInvestigator->faculty_id)->first()->name }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Designation</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ \App\Models\Designation::where('id', $principalInvestigator->designation_id)->first()->designation }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <x-ui.badge>{{$principalInvestigator->status}}</x-ui.badge>
                    </dd>
                </div>
                <div class="sm:col-span-2 space-y-5">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Resume</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                             xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('principal-investigators.downloads.resume', $principalInvestigator) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Download </a>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Research Grant Proposal</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                             xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('principal-investigators.downloads.GrantProposal', $principalInvestigator) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Download </a>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Budget Activity Plan</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                             xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('principal-investigators.downloads.BudgetActivityPlan', $principalInvestigator) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Download </a>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>

                    @if($principalInvestigator->co_principal_investigators->count())
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Co-Principal Investigator's Resumes</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                    @foreach($principalInvestigator->co_principal_investigators as $investigator)
                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                          d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                <span
                                                    class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('principal-investigators.co-principal-investigators.downloads.resume', $investigator->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    Download </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                    @endif

                    @if($principalInvestigator->research_assistants->count())
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Research Assistant's Resumes</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                    @foreach($principalInvestigator->research_assistants as $assistant)
                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                          d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                <span
                                                    class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('principal-investigators.research-assistant.downloads.resume', $assistant->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    Download </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                    @endif
                </div>
            </dl>
        </div>
    </div>
</x-app-layout>
