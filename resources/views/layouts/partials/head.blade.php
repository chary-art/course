<link rel="stylesheet" href="{{ asset('geeks/assets/libs/glightbox/dist/css/glightbox.min.css') }}">
<!-- Required meta tags -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="Charymyrat" />

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('geeks/assets/images/favicon/favicon.ico') }}" />

<!-- darkmode js -->
<script src="{{ asset('geeks/assets/js/vendors/darkMode.js') }}"></script>

<!-- Libs CSS -->
<link href="{{ asset('geeks/assets/fonts/feather/feather.css') }}" rel="stylesheet" />
<link href="{{ asset('geeks/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
<link href="{{ asset('geeks/assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('geeks/assets/css/theme.min.css') }}">

<link rel="stylesheet" href="{{ asset('slider/css/slider.css') }}">

<link rel="stylesheet" href="{{ asset('slider/splide-4.1.3/dist/css/splide.min.css') }}"/>
<script src="{{ asset('slider/splide-4.1.3/dist/js/splide.min.js') }}"></script>
<link href="{{ asset('geeks/assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
@yield('head')
<title> @yield('title', config('app.name'))</title>
