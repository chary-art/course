@extends('test.app3')

@section('title', 'Sign up')

@section('home')
    <link rel="canonical" href="#">
    <main>
        <section class="container d-flex flex-column vh-100">
            <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <h1 class="mb-1 fw-bold text-center">Sign up</h1>
                                <span>
                                        Already have an account?
                                        <a href="{{ route('login') }}" class="ms-1">Sign in</a>
                                    </span>
                            </div>
                            <!-- Form -->
                            <form class="" method="POST" action="{{ route('register') }}" novalidate>
                                @csrf
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" id="username"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           placeholder="User Name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" id="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           placeholder="Email address here" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{__('Password')}}</label>
                                    <input type="password" id="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           placeholder="**************" autocomplete="new-password" required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation"
                                           class="form-label">{{__('Confirm Password')}}</label>
                                    <input type="password" id="password_confirmation"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password_confirmation"
                                           placeholder="**************" autocomplete="new-password" required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Checkbox -->
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="checkbox" class="form-check-input" id="agreeCheck"
                                               required>
                                        <label class="form-check-label" for="agreeCheck">
                                                <span>
                                                    I agree to the
                                                    <a href="#">Terms of Service</a>
                                                    and
                                                    <a href="#">Privacy Policy.</a>
                                                </span>
                                        </label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                                <div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Create Free Account</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="position-absolute bottom-0 m-4">
            <div class="dropdown">
                <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button"
                        aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                    <i class="bi theme-icon-active"></i>
                    <span class="visually-hidden bs-theme-text">Toggle theme</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="light" aria-pressed="false">
                            <i class="bi theme-icon bi-sun-fill"></i>
                            <span class="ms-2">Light</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                                aria-pressed="false">
                            <i class="bi theme-icon bi-moon-stars-fill"></i>
                            <span class="ms-2">Dark</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center active"
                                data-bs-theme-value="auto" aria-pressed="true">
                            <i class="bi theme-icon bi-circle-half"></i>
                            <span class="ms-2">Auto</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@endsection
