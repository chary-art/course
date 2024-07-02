@extends('layouts.app')

@section('title', 'Education1')

@section('home')
    <main>
        @include('home.banner')
        @include('home.course')
        @include('home.event')
        @include('home.teacher')
    </main>
@endsection

