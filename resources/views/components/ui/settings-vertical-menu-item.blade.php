<li {{ $attributes->merge(['class' => 'py-2 font-medium text-gray-600 border-l-2 border-transparent hover:border-l-2 hover:border-blue-700 hover:bg-blue-50 dark:hover:bg-dark-third hover:text-blue-600 dark:hover:text-dark-typography cursor-pointer']) }}>

    <div class="flex items-center w-full ml-3">

        <x-ui.svg-icon>
            {{ $slot }}
        </x-ui.svg-icon>

        <a href="#" class="ml-2">
            {{ $title }}
        </a>

    </div>

</li>
