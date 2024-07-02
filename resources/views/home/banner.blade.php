<section class="py-lg-8 py-6">
    <div class="container my-lg-8">
        <div class="row d-flex align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 col-12">
                <h3 class="display-4 fw-bold mb-3">
                    {{--                            {{ Str::limit( $banner->title, 40) }}--}}


                    <u class="text-warning"><span class="text-primary">{{ Str::limit( ($banners->first()->title ?? 'None'), 40) }}</span></u>
                </h3>
                <p class="lead mb-4">{{ Str::limit( ($banners->first()->description ?? 'None'), 40) }}</p>
                <ul class="list-unstyled mb-5">
                    <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)"
                             class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <span class="ms-2">{{ Str::limit( ($banners->first()->news ?? 'None'), 40) }}</span>
                    </li>
{{--                    <li class="mb-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)"--}}
{{--                             class="bi bi-check-circle-fill" viewBox="0 0 16 16">--}}
{{--                            <path--}}
{{--                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>--}}
{{--                        </svg>--}}
{{--                        <span class="ms-2">{{ __('messages.Customer service 24/7') }}</span>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div
                class="col-xxl-6 offset-xxl-1 col-xl-12 col-xl-10  col-lg-12 col-12 d-lg-flex justify-content-end">

                <section
                    id="image-carousel"
                    class="splide"
                    aria-label="Beautiful Images"
                >
                    <div class="splide__track ">
                        <ul class="splide__list  ">
                            @foreach($banners as $banner)
                                <li class="splide__slide">
                                    <img class="" src="{{ asset('storage/' . $banner->image) }}" alt=""/>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
                <script>
                    new Splide(".splide", {
                        type: "loop",
                        // heightRatio : 0.3,
                        perMove: 1,
                        perPage: 1,
                        gap: "1.5rem",
                        padding: 0,
                        rewind: true,
                        // width: "60vw",
                        pauseOnHover: 0,
                        // height: 390,
                        speed: 800,
                        rewindSpeed: 400,
                        // cover: true,
                        autoplay: true,
                        interval: 5e3,
                    }).mount();
                </script>
            </div>
        </div>
    </div>
</section>
