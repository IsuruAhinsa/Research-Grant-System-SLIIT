<form action="{{ route('request') }}" method="POST" class="sm:max-w-xl sm:mx-auto lg:mx-0">
    @csrf
    <div class="sm:flex">
        <div class="min-w-0 flex-1">
            <label for="email" class="sr-only">Email address</label>
            <input id="email" type="email" placeholder="Enter your email" name="email"
                   class="block w-full px-4 py-3 rounded-md border-0 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
            <x-ui.input-error for="email" class="mt-2"/>
        </div>
        <div class="mt-3 sm:mt-0 sm:ml-3">
            <button type="submit"
                    class="block w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-medium hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
                Request for Login
            </button>
        </div>
    </div>
    <p class="mt-3 text-sm text-gray-300 sm:mt-4">Start your free journey, no
        credit card necessary. By providing your email, you agree to our
        <a href="#" class="font-medium text-white">terms of service</a>.
    </p>
</form>
