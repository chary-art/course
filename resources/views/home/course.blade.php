<section class="py-lg-4 py-4 bg-light-subtle">
    <h1 class="text-center text-primary">{{ __('messages.Courses') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <script>document.addEventListener("DOMContentLoaded", function () {
                                new Splide(".course-splide", {
                                    type: "loop",
                                    autoplay: 1,
                                    interval: 3e3,
                                    pauseOnHover: 0,
                                    perMove: 1,
                                    perPage: 3,
                                    gap: "1rem",
                                    breakpoints: {768: {perPage: 2,}, 575: {perPage: 1,}}
                                    // autoplay: 1,
                                    // arrows: 0,
                                    // pauseOnHover: 0,
                                    // pagination: 0,
                                }).mount()
                            });
                        </script>
                        <section
                            id="image-carousel"
                            class="splide course-splide"
                            aria-label="Beautiful Images"
                        >
                            <div class="splide__track ">
                                <ul class="splide__list  ">
                                    @foreach($coursesAttributes as $coursesAttribute)
                                        <li class="splide__slide">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-12 col-md-12 col-12  mt-4">
                                                    <!-- Card -->
                                                    <div class="card mb-4">
                                                        <!-- Card body -->
                                                        <div class="card-body">
                                                            <div class="text-center">
                                                                <h4 class="h3 fw-bold text-center mt-1">
                                                                    @if(($coursesAttribute->course) == !null)
                                                                    <span class="text-primary text-center">{{ $coursesAttribute->course->course }}</span>
                                                                    @elseif(is_null($coursesAttribute->course))
                                                                        {{ '-' }}
                                                                    @endif
                                                                </h4>
                                                                <h4 class="mb-1">{{ $coursesAttribute->stage }}</h4>
                                                                {{ $coursesAttribute->{'stage_'.app()->getLocale()} }}
                                                                <p class="mb-0.5">
                                                                    {{ $coursesAttribute->description }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
