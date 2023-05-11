@if($principalInvestigator->research_assistants->count())
    <div>
        <dt class="text-sm font-medium text-gray-500">Research Assistant's Resumes</dt>
        <dd class="mt-1 text-sm text-gray-900">
            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                @foreach($principalInvestigator->research_assistants as $assistant)
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <x-icons.pdf-icon-img />
                            <span
                                class="ml-2 flex-1 w-0 truncate"> research_assistant_resume({{$loop->iteration}}).pdf </span>
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
