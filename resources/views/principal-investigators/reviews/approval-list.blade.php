<div>
    <div class="flow-root mt-6">
        <ul role="list" class="-my-5 divide-y divide-gray-200">
            @foreach(Auth::user()->principal_investigators as $application)
                <li class="py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8 rounded-full"
                                 src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $application->grant_number }}</p>
                            <p class="text-sm text-gray-500 truncate">{{ $application->faculty->name }}</p>
                        </div>
                        <div>
                            <a href="#"
                               class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                Approve </a>

                            <a href="#"
                               class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-red-500 text-sm leading-5 font-medium rounded-full text-white bg-red-500 hover:bg-red-600">
                                Reject </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

