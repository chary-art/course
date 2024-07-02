@extends('test.app3')

@section('home')

    <div class="container">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <div>
                <label for="name">{{__('Name')}}</label>
                <input type="text" id="name" name="name" class="mt-1 block"
                       value="{{ old('name', $user->name) }}"
                       autofocus
                       autocomplete="'name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="name">{{__('Email')}}</label>
                <input type="email" id="name" name="email"
                       class="mt-1 block" value="{{ old('name', $user->email) }}"
                       autofocus
                       autocomplete="'name">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
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

            <div class="flex items-center gap-4">
                <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 1)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}
                    </p>
                @endif
            </div>
        </form>
    </div>


    <div class="container">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
            <div>
                <label for="update_password_current_password">{{__('Current Password')}}</label>
                <input type="password" id="update_password_current_password" name="current_password"
                       class="mt-1 block w-full" autofocus autocomplete="current-password">
                @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="update_password_password">{{__('New Password')}}</label>
                <input type="password" id="update_password_password" name="password"
                       class="mt-1 block w-full" autofocus autocomplete="new-password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="update_password_password_confirmation">{{__('Confirm Password')}}</label>
                <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                       class="mt-1 block w-full" autofocus autocomplete="new-password">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                @if (session('status') === 'password-updated')
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
    </div>
    <div class="container">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

        <button class="btn btn-primary" type="submit">{{ __('Delete Account') }}</button>

        {{--        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>--}}
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <label class="sr-only" for="password">{{ __('Password') }}</label>
                <input type="password" id="password" name="password"
                       class="mt-1 block w-full" autofocus autocomplete="new-password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <button class="btn btn-dark-success" type="reset">{{ __('Cancel') }}</button>


{{--                                    <x-secondary-button x-on:click="$dispatch('close')">--}}
{{--                                        {{ __('Cancel') }}--}}
{{--                                    </x-secondary-button>--}}

{{--                                    <x-danger-button class="ms-3">--}}
{{--                                        {{ __('Delete Account') }}--}}
{{--                                    </x-danger-button>--}}


                <button class="btn btn-danger" type="submit"> {{ __('Delete Account') }}</button>
            </div>
        </form>
    </div>
@endsection
