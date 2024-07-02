@extends('test.app3')

@section('title', 'Verify password')

@section('home')
    <main>
        <section class="container d-flex flex-column vh-100">
            <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <h1 class="mb-1 fw-bold text-center">{{ __('Verify Email') }}</h1>
                            </div>
                            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif
                            <!-- Form -->
                            <form class="needs-validation" method="POST" action="{{ route('verification.send') }}"
                                  novalidate>
                                @csrf
                                <div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">{{ __('Resend Verification Email') }}</button>
                                    </div>
                                </div>
                            </form>
                            <form class="needs-validation" method="POST" action="{{ route('logout') }}"
                                  novalidate>
                                @csrf
                                <div class="mt-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-dark-danger">{{ __('Log Out') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
