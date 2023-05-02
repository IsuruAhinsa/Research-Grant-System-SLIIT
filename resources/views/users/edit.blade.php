<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('users.edit', $user) }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit User') }}
            </h2>
        </div>

        @include('users.partials.action-buttons')
    </x-slot>

    <div class="bg-white rounded-xl py-10 px-12 my-5 shadow lg:max-w-3xl lg:mx-auto">
        <div class="flex items-center mb-4">
            <x-ui.svg-icon class="mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </x-ui.svg-icon>
            {{ __('Edit User') }}
        </div>

        <form class="row" method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')
            <div class="relative w-full sm:max-w-half sm:flex-half space-y-4">

                <div>
                    <x-ui.label for="name" value="{{ __('Name') }}"/>
                    <x-ui.input id="name" type="text" placeholder="Enter Name" class="mt-1 block w-full" name="name" value="{{ old('name', $user->name) }}"/>
                    <x-ui.input-error for="name" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="email" value="{{ __('Email Address') }}"/>
                    <x-ui.input id="email" type="email" placeholder="Enter Email Address" class="mt-1 block w-full" name="email" value="{{ old('email', $user->email) }}"/>
                    <x-ui.input-error for="email" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="roles" value="{{ __('Roles') }}"/>
                    <x-ui.select class="mt-1 block w-full" name="roles">
                        @foreach($roles as $role)
                            <option @selected($role->name == $user->hasRole($role->name)) value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </x-ui.select>
                    <x-ui.input-error for="roles" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="password" value="{{ __('Password') }}"/>
                    <x-ui.input id="password" type="password" placeholder="Enter Password" class="mt-1 block w-full" name="password"/>
                    <x-ui.input-error for="password" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                    <x-ui.input id="password_confirmation" type="password" placeholder="Re-enter Password"
                                class="mt-1 block w-full" name="password_confirmation"/>
                </div>

            </div>
            <div class="flex flex-row justify-end space-x-4 py-4">
                <x-ui.secondary-button>
                    Nevermind
                </x-ui.secondary-button>

                <x-ui.button type="submit">
                    {{ __('Save User') }}
                </x-ui.button>
            </div>
        </form>
    </div>
</x-app-layout>
