<x-guest-layout>
    <x-slot name="authForm">
        <x-ui.authentication-card>
            <x-slot name="logo">
                <x-ui.authentication-card-logo/>
            </x-slot>

            <x-ui.validation-errors class="mb-4"/>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-ui.label for="email" value="{{ __('Email') }}"/>
                    <x-ui.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus autocomplete="username"/>
                </div>

                <div class="mt-4">
                    <x-ui.label for="password" value="{{ __('Password') }}"/>
                    <x-ui.input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password"/>
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-ui.checkbox id="remember_me" name="remember"/>
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <x-ui.button class="w-full bg-secondary-800 hover:bg-secondary-900 active:bg-secondary-800 focus:bg-secondary-800 rounded-3xl text-center py-3 mt-5">
                    {{ __('Sign in') }}
                </x-ui.button>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </x-ui.authentication-card>
    </x-slot>
</x-guest-layout>
