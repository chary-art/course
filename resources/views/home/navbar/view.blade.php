@extends('layouts.app')

@section('home')
    <div class="col">
        <h2 class="h1 fw-bold text-center mt-3">
            <span class="text-primary text-center">{{ __('messages.Video') }}</span>
        </h2>
    </div>
    <section class="py-1 bg-gray-100">
        <div class="container my-lg-8 ">
            <div class="row justify-content-center">


                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="">
{{--                                    <video width="320" height="240" controls>--}}
{{--                                        <source src="{{ asset('storage/' . $file->video) }}" type="video/mp4">--}}
{{--                                    </video>--}}
{{--                                    {{ dd($file) }}--}}
                                    <iframe src="{{ asset('storage/' . $file->video) }}">
                                    </iframe>
{{--                                    33333333333333333--}}
                                </div>
                                <h4 class="mt-2">
                                    @if(($file->title) == !null)
                                        <span>
                                            {{ __('messages.Title') }} : <span
                                                class="text-primary">{{ Str::limit( $file->title, 40) }}</span>
                                        </span>
                                    @elseif(is_null($file->title))
                                        {{ '-' }}
                                    @endif
                                </h4>
                                <h4 class="mt-2">
                                    @if(($file->teacher) == !null)
                                        <span>
                                            {{ __('messages.Teacher') }} : <span
                                                class="text-primary">{{ Str::limit( $file->teacher->name, 40) }}</span>
                                        </span>
                                    @elseif(is_null($file->teacher))
                                        {{ '-' }}
                                    @endif
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
