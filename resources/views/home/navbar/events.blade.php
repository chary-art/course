@extends('layouts.app')

@section('home')
    <div class="col">
        <h2 class="h1 fw-bold text-center mt-3">
            <span class="text-primary text-center">{{ __('messages.Events') }}</span>
        </h2>
    </div>
    @foreach($events as $event)
        @if($event->id % 2 == 0)
            <section class="py-lg-8 py-6 bg-white-100">
                <div class="container my-lg-8">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-12 col-12">
                                    <div class="mb-5 mb-lg-0">
                                        <h2 class="display-4 fw-bold mb-3">
                                            {{ $event->title }}
                                        </h2>
                                        <p class="mb-5 lead">{{ $event->description }}</p>
                                        <a href="" class="btn btn-outline-secondary">Get
                                            Started</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1 col-md-12 col-12">
                                    <script>document.addEventListener("DOMContentLoaded", function () {
                                            new Splide(".event-{{ $event->id }}-splide", {
                                                type: "loop",
                                                autoplay: 1,
                                                interval: 3e3,
                                                pauseOnHover: 0,
                                                perMove: 1,
                                                perPage: 1,
                                            }).mount()
                                        });</script>

                                    <div class="bg-white rounded-3">
                                        <section
                                            id="image-carousel"
                                            class="splide  event-{{ $event->id }}-splide"
                                            aria-label="Beautiful Images"
                                        >
                                            <div class="splide__track ">
                                                <ul class="splide__list  ">
                                                    <li class="splide__slide">
                                                        <img class="" src="{{ asset('storage/' . $event->image) }}"
                                                             alt=""/>
                                                    </li>
                                                </ul>
                                            </div>
                                        </section>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="py-lg-8 py-6 bg-gray-100">
                <div class="container my-lg-8">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <script>document.addEventListener("DOMContentLoaded", function () {
                                            new Splide(".event-{{ $event->id }}-splide", {
                                                type: "loop",
                                                autoplay: 1,
                                                interval: 3e3,
                                                pauseOnHover: 0,
                                                perMove: 1,
                                                perPage: 1,
                                            }).mount()
                                        });</script>

                                    <div class="bg-white rounded-3">
                                        <section
                                            id="image-carousel"
                                            class="splide  event-{{ $event->id }}-splide"
                                            aria-label="Beautiful Images"
                                        >
                                            <div class="splide__track ">
                                                <ul class="splide__list  ">
                                                    <li class="splide__slide">
                                                        <img class="" src="{{ asset('storage/' . $event->image) }}"
                                                             alt=""/>
                                                    </li>
                                                </ul>
                                            </div>
                                        </section>
                                    </div>

                                </div>
                                <div class="col-lg-5 offset-lg-1 col-md-12 col-12">
                                    <div class="mb-5 mb-lg-0">
                                        <h2 class="display-4 fw-bold mb-3">
                                            {{ $event->title }}
                                            {{--                                        <u class="text-warning"><span class="text-primary">your career</span></u>--}}
                                        </h2>
                                        <p class="mb-5 lead">{{ $event->description }}</p>
                                        <a href="" class="btn btn-outline-secondary">Get
                                            Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    <section class="py-lg-8 py-6 bg-gray-100 text-center">
        <div class="container my-lg-8">
            <div class="row">
                {{ $events->links() }}
                {{--                            {{ $events->appends(request()->except('page'))->links() }}--}}
            </div>
        </div>
        </div>
    </section>

@endsection
