<!doctype html>
{{--<html lang="en">--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')
<body>

@yield('home')

@include('layouts.partials.script')

</body>
</html>
