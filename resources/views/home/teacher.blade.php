<section class="py-lg-4 py-4 bg-light-subtle">
    <h1 class="text-center text-primary">{{ __('messages.Teachers') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <script>document.addEventListener("DOMContentLoaded", function () {
                                new Splide(".teacher-splide", {
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
                            class="splide teacher-splide"
                            aria-label="Beautiful Images"
                        >
                            <div class="splide__track ">
                                <ul class="splide__list  ">
                                    @foreach($teachers as $teacher)
                                        <li class="splide__slide">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-12 col-md-12 col-12 mt-4">
                                                    <!-- Card -->
                                                    <div class="card mb-4">
                                                        <!-- Card body -->
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row justify-content-center">
                                                                    {{--                                                                            <div class="col-4"><img--}}
                                                                    {{--                                                                                    class="center-block rounded-circle border"--}}
                                                                    {{--                                                                                    alt="{{ $teacher->name }}"--}}
                                                                    {{--                                                                                    src="{{ asset('storage/' . $teacher->image) }}"/>--}}
                                                                    {{--                                                                            </div>--}}
                                                                    <div class="col-5 d-flex">
                                                                        {{--                                                                                <div class="position-relative">--}}
                                                                        {{--                                                                                    <img src="{{ asset('storage/' . $teacher->image) }}" alt="" class="img-4by3-lg rounded">--}}
                                                                        {{--                                                                                </div>--}}
                                                                        <img
                                                                            src="{{ asset('storage/' . $teacher->image) }}"
                                                                            class="rounded-circle avatar-xl mb-3"
                                                                            alt="avatar">
                                                                    </div>

                                                                    <div class="text-center">

                                                                        <h4 class="mb-0">{{ $teacher->name }} {{ $teacher->surname }}</h4>
                                                                        @if(($teacher->course) == !null)
                                                                        <p class="mb-0 fs-6">{{ $teacher->course->course }} language teacher</p>
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
