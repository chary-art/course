@extends('layouts.app')

@section('home')
    <div class="col">
        <h2 class="h1 fw-bold text-center mt-3">
            <span class="text-primary text-center">{{ __('messages.Teachers') }}</span>
        </h2>
    </div>
    <section class="py-1 bg-gray-100">
        <div class="container my-lg-8 ">
            <div class="row justify-content-center">
                @foreach($teachers as $teacher)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $teacher->image) }}"
                                         class="rounded-circle avatar-xl mb-3" alt="avatar">
                                    <h4 class="mb-0">{{ $teacher->name }} {{ $teacher->surname }}</h4>
                                    @if(($teacher->course) == !null)
                                    <p class="mb-0 fs-6">{{ $teacher->course->course }} {{ __('messages.teacher') }}</p>
                                    @elseif(is_null($teacher->course))
                                        {{ '-' }}
                                    @endif
                                </div>
                                <div class="d-flex border-bottom py-2 mt-4">
                                    <span>{{ __('messages.Work experience') }}: {{ Str::limit( $teacher->experience, 25) }}</span>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <span>{{ __('messages.Degree') }}: {{ Str::limit( $teacher->degree, 25) }} </span>
                                </div>
                                <div class="d-flex pt-2">
                                    <span>{{ __('messages.Hobbies') }}: {{ Str::limit( $teacher->hobby, 40) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
