<div class="pt-10 bg-gray-900 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
    <div class="mx-auto max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8">

            @if(isset($authForm))
                {{ $authForm }}
            @else
                <div
                    class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                    <div class="lg:py-24">
                        <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                            <span class="block">Get Register to RGS as</span>
                            <span
                                class="pb-3 block bg-clip-text text-transparent bg-gradient-to-r from-teal-200 to-cyan-400 sm:pb-5">Principal Investigator</span>
                        </h1>
                        <p class="text-base text-gray-300 sm:text-xl lg:text-lg xl:text-xl">
                            Please enter your valid sliit email address when requesting to login to your account.
                        </p>
                        <div class="mt-10 sm:mt-12">
                            @include('layouts.partials.request-form')
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                    <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                    <img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                         src="https://tailwindui.com/img/component-images/cloud-illustration-teal-cyan.svg"
                         alt="">
                </div>
            </div>
        </div>
    </div>
</div>
