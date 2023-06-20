<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('users.create') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create User') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl py-10 px-12 my-5 shadow lg:max-w-full lg:mx-auto">
        <div class="flex items-center mb-4">
            <x-ui.svg-icon class="mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </x-ui.svg-icon>
            {{ __('Create New User') }}
        </div>

        <form class="row" method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div>
                    <x-ui.label for="title" value="{{ __('Title') }}"/>
                    <x-ui.input list="titles" id="title" type="text" placeholder="Enter Title" class="mt-1 block w-full" name="title" value="{{ old('title') }}"/>
                    <datalist id="titles">
                        <option value="Dr">
                        <option value="Esq">
                        <option value="Hon">
                        <option value="Jr">
                        <option value="Mr">
                        <option value="Mrs">
                        <option value="Ms">
                        <option value="Messrs">
                        <option value="Mmes">
                        <option value="Msgr">
                        <option value="Prof">
                        <option value="Rev">
                        <option value="Rt. Hon">
                        <option value="Sr">
                        <option value="St">
                    </datalist>
                    <x-ui.input-error for="title" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="first_name" value="{{ __('First Name') }}"/>
                    <x-ui.input id="first_name" type="text" placeholder="Enter First Name" class="mt-1 block w-full" name="first_name" value="{{ old('first_name') }}"/>
                    <x-ui.input-error for="first_name" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="last_name" value="{{ __('Last Name') }}"/>
                    <x-ui.input id="last_name" type="text" placeholder="Enter Last Name" class="mt-1 block w-full" name="last_name" value="{{ old('last_name') }}"/>
                    <x-ui.input-error for="last_name" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="email" value="{{ __('Email Address') }}"/>
                    <x-ui.input id="email" type="email" placeholder="Enter Email Address" class="mt-1 block w-full" name="email" value="{{ old('email') }}"/>
                    <x-ui.input-error for="email" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="index" value="{{ __('SLIIT ID') }}"/>
                    <x-ui.input id="index" type="text" placeholder="Enter SLIIT ID" class="mt-1 block w-full" name="index" value="{{ old('index') }}"/>
                    <x-ui.input-error for="index" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="faculty" value="{{ __('Faculty') }}"/>
                    <x-ui.select class="mt-1 block w-full" name="faculty">
                        <option selected disabled>Select a faculty</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}" {{ old('faculty') == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}</option>
                        @endforeach
                    </x-ui.select>
                    <x-ui.input-error for="faculty" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="designation" value="{{ __('Designation') }}"/>
                    <x-ui.select class="mt-1 block w-full" name="designation">
                        <option selected disabled>Select a Designation</option>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}" {{ old('designation') == $designation->id ? 'selected' : '' }}>{{ $designation->designation }}</option>
                        @endforeach
                    </x-ui.select>
                    <x-ui.input-error for="designation" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="roles" value="{{ __('Roles') }}"/>
                    <x-ui.select class="mt-1 block w-full" name="roles">
                        <option selected disabled>Select a Designation</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ old('roles') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
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
                    {{ __('Add New User') }}
                </x-ui.button>
            </div>
        </form>
    </div>
</x-app-layout>
