<footer class="bg-gray-50" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-md mx-auto pt-12 px-4 sm:max-w-7xl sm:px-6 lg:pt-16 lg:px-8">
        <div class="flex justify-center">
            <div class="text-center">
                <img {{$attributes}} src="{{asset('images\logo.png')}}" alt="logo" class="inline-block w-16 h-auto align-middle border-none"/>
                <p class="text-base font-bold">
                    Powered By
                </p>
                <p class="text-base">
                    Business Application Services Division - SLIIT
                </p>
            </div>
        </div>
        <div class="mt-6 border-t border-gray-200 py-8">
            <p class="text-base text-gray-400 xl:text-center">
                © {{ \Carbon\Carbon::today()->toDate()->format('Y') }} Business Application Services Division - SLIIT, All rights reserved.
            </p>
        </div>
    </div>
</footer>
