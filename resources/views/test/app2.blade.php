<!doctype html>
{{--<html lang="en">--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')
<body class="bg-white">

@include('layouts.partials.navbar')


@yield('home')

@include('layouts.partials.footer')

@include('layouts.partials.script')

</body>
</html>
