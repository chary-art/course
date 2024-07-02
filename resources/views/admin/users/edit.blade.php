@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-10 col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                            <div class="position-relative">
                                {{--                                {{ dd(Auth::user()->image) }}--}}
                                <img src="{{ asset('storage/' . $user->image) }}" alt="" class="img-4by3-lg rounded">
                                {{--                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" class="img-4by3-lg rounded">--}}
                                {{--                                <img src="{{ asset('storage/images/user/dEWKVjl4p1q2mKiJbP012kmEozIJn7sogffPDv3I.jpg')}}" alt="" class="img-4by3-lg rounded">--}}
                            </div>
                            <div class="ms-3">
                                <h3 class="mb-0">{{ __('messages.Profile Details') }}</h3>
                                <h5 class="mb-0">{{ __('messages.Edit your personal information.') }}</h5>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.user.show', $user->id) }}"
                               class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</a>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="row justify-content-evenly">
                        <div class="col col-12 col-lg-6 col-md-12">
                            {{--                            <form id="send-verification" method="post" action="{{ route('verification.send'   ) }}">--}}
                            {{--                                @csrf--}}
                            {{--                            </form>--}}
                            <form method="post" action="{{ route('admin.user.update', $user->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3 col-12 col-lg-9 col-md-10">
                                    <label class="form-label" for="name">{{__('messages.Name')}}</label>
                                    <input type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $user->name) }}"
                                           autofocus autocomplete="name">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-lg-9 col-md-10">
                                    <label class="form-label" for="email">{{__('E-mail')}}</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control"
                                           value="{{ old('email', $user->email) }}"
                                           autofocus autocomplete="email">
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
                                <div class="mb-3 col-12 col-lg-9 col-md-10">
                                    <label class="form-label" for="surname">{{__('messages.Surname')}}</label>
                                    <input type="text" name="surname" id="surname"
                                           class="form-control @error('surname') is-invalid @enderror"
                                           value="{{ old('surname', $user->surname) }}"
                                           autofocus autocomplete="surname">
                                    @error('surname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="image">{{ __('messages.Image') }}</label>
                                    <input type="file" name="image" id="image"
                                           {{--                                           class="form-control @error('image') is-invalid @enderror">--}}
                                           class="form-control" value="{{ old('image') }}">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role">{{ __('messages.Choose role') }}</label>
                                    <select name="role_id" class="form-select text-dark fs-4" id="role" required=''>
                                            @foreach($roles as $id => $role)
                                                <option
                                                    value="{{ $id }}" {{ $user->role_id == $id ? 'selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @endforeach
                                    </select>
                                    @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">Please choose role.</div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <button class="btn btn-primary" type="submit">{{ __('messages.Submit') }}</button>
                                    @if (session('status') === 'profile-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400"
                                        >{{ __('messages.Saved.') }}
                                        </p>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="col col col-12 col-lg-6 col-md-12">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('messages.Update Password') }}
                            </h2>
                            <div class="rounded bg-light-primary mt-2">
                                <p class="text-dark text-center">{{ __('messages.Ensure your account is using a long, random password to stay secure.') }}</p>
                            </div>
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')
                                <div class="mb-3 col-12 col-lg-9 col-md-10">
                                    <label class="form-label"
                                           for="update_password_current_password">{{__('messages.Current Password')}}</label>
                                    <input type="password" name="current_password" id="update_password_current_password"
                                           class="form-control @error('current_password') is-invalid @enderror"
                                           autofocus autocomplete="current-password" required>
                                    @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-lg-9 col-md-10">
                                    <label class="form-label"
                                           for="update_password_password">{{__('messages.New Password')}}</label>
                                    <input type="password" name="password" id="update_password_password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           autofocus autocomplete="new-password" required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-lg-9 col-md-10">
                                    <label class="form-label"
                                           for="update_password_password_confirmation">{{__('messages.Confirm Password')}}</label>
                                    <input type="password" id="update_password_password_confirmation"
                                           name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           autofocus autocomplete="new-password" required>
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="flex items-center gap-4">
                                    <button class="btn btn-primary" type="submit">{{ __('messages.Submit') }}</button>
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
                        <hr class="my-5">
                    </div>
                    <div class="col col-12 col-lg-6 col-md-12">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('messages.Delete Account') }}
                        </h2>
                        <div class="rounded bg-light-primary mt-2">
                            <p class="text-dark text-center">{{ __('messages.Once your account is deleted, all of its resources and
                            data will be permanently deleted, Before deleting your account, please
                             download any data or information that you wish to retain') }}</p>
                        </div>
                        <form method="post" action="{{ route('profile.destroy') }}" class="mt-2"
                        @csrf
                        @method('delete')
                        <div class="mb-3 col-12 col-lg-6 col-md-6">
                            <label class="form-label" for="password">{{ __('messages.Password') }}</label>
                            <input type="password" id="password" name="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   autofocus autocomplete="new-password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button class="btn btn-dark-success" type="reset">{{ __('messages.Cancel') }}</button>
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                  data-bs-trigger="hover focus" data-bs-content="{{ __('messages.Attention') }}">
                            <button class="btn btn-danger" type="submit"
                                    onclick="return confirm(' Are you sure! ')"> {{ __('messages.Delete Account') }}</button>
                            </span>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
