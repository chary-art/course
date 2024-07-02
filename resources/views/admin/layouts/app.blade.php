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
            @include('admin.layouts.partials.sidebar')
        </div>
    </nav>
    <main id="page-content">
        <div class="header">
            <!-- navbar.blade.php -->
            <nav class="navbar-default navbar navbar-expand-lg">
                <a id="nav-toggle" href="admin-dashboard.html#">
                    <i class="fe fe-menu"></i>
                </a>
                @include('admin.layouts.partials.navbar')
            </nav>
        </div>
        <section class="container-fluid p-4">
            @yield('content')
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
