<x-ui.form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                <x-ui.label for="photo" value="{{ __('Photo') }}"/>

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                         class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-ui.secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-ui.secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-ui.secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-ui.secondary-button>
                @endif

                <x-ui.input-error for="photo" class="mt-2"/>
            </div>
        @endif

        @if(auth()->user()->title != null)
            <div class="col-span-6 sm:col-span-4">
                <x-ui.label for="title" value="{{ __('Title') }}"/>
                <x-ui.input list="titles" id="title" type="text" class="mt-1 block w-full"
                            wire:model.defer="state.title" autocomplete="title"/>
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
        @endif

        <div class="col-span-6 sm:col-span-4">
            <x-ui.label for="first_name" value="{{ __('First Name') }}"/>
            <x-ui.input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name"
                        autocomplete="first_name"/>
            <x-ui.input-error for="first_name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-ui.label for="last_name" value="{{ __('Last Name') }}"/>
            <x-ui.input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name"
                        autocomplete="last_name"/>
            <x-ui.input-error for="last_name" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-ui.label for="email" value="{{ __('Email') }}"/>
            <x-ui.input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email"
                        autocomplete="username"/>
            <x-ui.input-error for="email" class="mt-2"/>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        @if(auth()->user()->faculty_id != null)
            <div class="col-span-6 sm:col-span-4">
                <x-ui.label for="faculty" value="{{ __('Faculty') }}"/>
                <x-ui.select class="mt-1 block w-full" name="faculty" wire:model="state.faculty_id">
                    <option selected disabled>Select a faculty</option>
                    @foreach(\App\Models\Faculty::all() as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </x-ui.select>
                <x-ui.input-error for="faculty" class="mt-2"/>
            </div>
        @endif

        @if(auth()->user()->designation_id != null)
            <div class="col-span-6 sm:col-span-4">
                <x-ui.label for="designation" value="{{ __('Designation') }}"/>
                <x-ui.select class="mt-1 block w-full" name="designation" wire:model="state.designation_id">
                    <option selected disabled>Select a Designation</option>
                    @foreach(\App\Models\Designation::all() as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                    @endforeach
                </x-ui.select>
                <x-ui.input-error for="designation" class="mt-2"/>
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-ui.action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-ui.action-message>

        <x-ui.button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-ui.button>
    </x-slot>
</x-ui.form-section>
