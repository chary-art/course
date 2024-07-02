<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.partials.head')
</head>

<body>
<!-- Wrapper -->
<div id="db-wrapper">
    <nav class="navbar-vertical navbar">
        <div class="vh-100" data-simplebar>
            @if(Auth()->user()->is_admin == true )
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <li class="nav-item mt-2">
                        <a class="nav-link primary-hover" href="{{ route('admin.home.index') }}">
                    <span>
                        <i class="bi bi-house-fill"></i>
                    </span>
                            <span class="ms-2">{{ __('messages.Go to Admin Panel') }}</span>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </nav>
    <main id="page-content">
        <div class="header">
            <!-- navbar.blade.php -->
            <nav class="navbar-default navbar navbar-expand-lg">
                <a id="nav-toggle" href="admin-dashboard.html#">
                    <i class="fe fe-menu"></i>
                </a>
                <div class="mt-2 m-2">You are the
                    @foreach($users as $user)
                        @if(Auth()->user()->role_id == '1')
                            {{ 'Student' }}
                        @elseif(Auth()->user()->role_id == '2')
                            {{ 'Admin' }}
                        @elseif(Auth()->user()->role_id == '3')
                            {{ 'Teacher' }}
                        @endif
                    @endforeach
                </div>
                @include('admin.layouts.partials.navbar')
            </nav>
        </div>
        <section class="container-fluid p-4">
            @if ($message = Session::get('message'))
                <div class="alert alert-success my-2">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="border-bottom pb-3 mb-3 d-lg-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-lg-0">
                            <h1 class="mb-0 h2 fw-bold">{{__('messages.Dashboard')}}</h1>
                        </div>
                        @if(Auth()->user()->is_admin == true )
                            <div class="d-flex">
                                <a href="{{ route('admin.home.index') }}"
                                   class="btn btn-primary">{{__('messages.Go to Admin Panel')}}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{--            @include('admin.layouts.partials.card')--}}
        </section>
    </main>
</div>

<!-- Script -->

<!-- Libs JS -->
<script src="{{ asset('geeks/assets/libs/_popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('geeks/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('geeks/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('geeks/assets/js/theme.min.js') }}"></script>

<script src="{{ asset('geeks/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('geeks/assets/js/vendors/chart.js') }}"></script>
<script src="{{ asset('geeks/assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('geeks/assets/js/vendors/flatpickr.js') }}"></script>
@yield('script')
</body>
</html>

