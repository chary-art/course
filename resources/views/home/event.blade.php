<section class="py-lg-4 py-4 bg-white">
    <h1 class="text-center text-primary">{{ __('messages.Events') }}</h1>
    <div class="container my-lg-8">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                <div class="row align-items-center">
                    <div class="col-lg-6  col-md-12 col-12">
                        <script>document.addEventListener("DOMContentLoaded", function () {
                                new Splide(".event-splide", {
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
                                class="splide event-splide"
                                aria-label="Beautiful Images"
                            >
                                <div class="splide__track ">
                                    <ul class="splide__list  ">
                                        @foreach($events as $event)
                                        <li class="splide__slide">
                                            <img class="" src="{{ asset('storage/' . $event->image) }}" alt=""/>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                        </div>

                    </div>
                    <div class="col-lg-5 py-2 offset-lg-1 col-md-12 col-12">
                        <div class="mb-5 mb-lg-0">
                            <h2 class="display-4 fw-bold mb-3">
                                {{ Str::limit( ($events->first()->title ?? "None"), 40) }}
                                <u class="text-warning"><span class="text-primary"></span></u>
                            </h2>
                            <p class="mb-5 lead">{{ Str::limit( ($events->first()->description ?? "None"), 120) }}</p>
                            <a href="{{ route('home.events') }}" class="btn btn-outline-secondary">Get
                                Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="my-0 bg-transparent text-gray">
<div class="py-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-12">
                        <div class="d-flex mb-4 mb-md-0">
                            <div class="icon icon-shape rounded icon-md bg-gray-300 p-4">
                                <i class="bi bi-play-fill fs-4 text-gray-600"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-0 text-dark fw-medium">{{ __('messages.Learn more than 100 video courses') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-12">
                        <div class="d-flex mb-4 mb-md-0">
                            <div class="icon icon-shape rounded icon-md bg-gray-300 p-4">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                     fill="currentColor" class="bi bi-star-fill text-gray-600"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            </span>
                            </div>
                            <div class="ms-3">
                                <p class="mb-0 text-dark fw-medium">{{ __('messages.Choose courses taught by experienced professionals') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-12">
                        <div class="d-flex">
                            <div class="icon icon-shape rounded icon-lg bg-gray-300 p-4">
                                <i class="bi bi-infinity fs-4 text-gray-600"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-0 text-dark fw-medium">{{ __('messages.Study the courses at your own pace') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="my-0 bg-transparent text-gray">
