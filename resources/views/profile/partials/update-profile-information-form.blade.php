<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                          required autofocus autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="title" :value="__('Title')"/>
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $user->title)"
                          required autocomplete="title"/>
            <x-input-error class="mt-2" :messages="$errors->get('title')"/>
        </div>

        <div>
            <x-input-label for="bio" :value="__('Bio')"/>
            <x-text-input id="bio" name="bio" type="text" class="mt-1 block w-full" :value="old('bio', $user->bio)"
                          required autocomplete="title"/>
            <x-input-error class="mt-2" :messages="$errors->get('bio')"/>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          :value="old('email', $user->email)" required autocomplete="email"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')"/>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <label for="avatar" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Avatar</label>
            <div class="inline-flex">
                @if(auth()->user()->avatar_url)
                    <div class="mr-3">
                        <img src="{{ asset('storage/' . auth()->user()->avatar_url) }}"
                             class="h-16 w-16 border border-gray-900 rounded-xl"/>
                    </div>
                @endif
                <div class="mt-1" x-data="{show: false}">
                    <input type="file" id="avatar" name="avatar_url" onChange="onFileUploadChange()"
                           class="hidden border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                    <button type="button" class="bg-gray-900 hover:bg-gray-700 rounded-xl text-gray-50 border border-gray-900 text-sm p-2 custom-shadow"
                            onclick="document.getElementById('avatar').click()">Upload a file
                    </button>
                    @if(auth()->user()->avatar_url)
                        <button type="button" class="bg-red-900 hover:bg-red-700 rounded-xl text-gray-50 border border-gray-900 text-sm p-2 ml-3 custom-shadow"
                                @click="show = true">Delete Avatar
                        </button>

                        <div x-show="show">
                            <x-confirm-modal title="Delete Avatar" icon="exclamation-triangle">
                                Are you sure you want to remove your avatar?
                                <x-slot:cta>
                                    <button type="button"
                                            @click="document.querySelector('#deleteAvatar').submit()"
                                            class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                        Delete
                                    </button>
                                    <button @click.prevent="show = false" type="button"
                                            class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Cancel
                                    </button>
                                </x-slot:cta>
                            </x-confirm-modal>
                        </div>
                    @endif
                    <span class="text-xs text-gray-900 dark:text-gray-50 flex mt-1" id="image-upload"></span>
                    <script>
                        onFileUploadChange = () => {
                            let path = document.getElementById('avatar').value.split('\\')
                            document.getElementById('image-upload').innerText = 'Selected File: ' + path[path.length - 1];
                        }
                    </script>
                </div>
            </div>


            <x-input-error class="mt-2" :messages="$errors->get('avatar_url')"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    <form action="{{route('profile.update')}}" id="deleteAvatar" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="remove-avatar" value="1">
    </form>
</section>
