@extends('layouts.app')

@section('home')
    <div class="col">
        <h2 class="h1 fw-bold text-center mt-3">
            <span class="text-primary text-center">{{ __('messages.Courses') }}</span>
        </h2>
    </div>
    <section class="bg-auto">
        <div class="container my-lg-8">
            <div class="row justify-content-center">
                @foreach($course_names as $course_name)
                    <div class="col-lg-4 col-md-6 col-12  mt-4">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="h3 fw-bold text-center mt-1">
                                        <span class="text-primary text-center">{{ $course_name->course->course }}</span>
                                        <h4 class="mb-1">{{ $course_name->stage }}</h4>
                                        {{ $course_name->description }} language course
                                    </h4>
                                    <p class="mb-0.5">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
