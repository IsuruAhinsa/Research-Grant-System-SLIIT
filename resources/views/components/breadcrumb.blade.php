@unless ($breadcrumbs->isEmpty())
    <ul class="inline-flex flex-row items-center justify-start space-x-2 text-gray-500 text-sm font-medium">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}" class="hover:underline hover:text-secondary-800">{{ $breadcrumb->title }}</a></li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </li>
            @else
                <li class="text-indigo-500">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ul>
@endunless
