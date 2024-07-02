<nav class="navbar navbar-expand-lg shadow-none">
    <div class="container px-0">
        <a class="navbar-brand" href="{{ route('home.index') }}"><b>Education</b><img src="" alt=""/></a>
        <div class="d-flex align-items-center order-lg-3">
            <div class="d-flex align-items-center">
                <div class="dropdown me-2">
                    <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button"
                            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                        <i class="bi theme-icon-active"></i>
                        <span class="visually-hidden bs-theme-text">Toggle theme</span>
                    </button>


                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light" aria-pressed="false">
                                <i class="bi theme-icon bi-sun-fill"></i>
                                <span class="ms-2">Light</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark" aria-pressed="false">
                                <i class="bi theme-icon bi-moon-stars-fill"></i>
                                <span class="ms-2">Dark</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="auto" aria-pressed="true">
                                <i class="bi theme-icon bi-circle-half"></i>
                                <span class="ms-2">Auto</span>
                            </button>
                        </li>
                    </ul>
                </div>

                @foreach(config('app.available_locales') as $locale)
                    <a href="{{ request()->url() }}?language={{ $locale }}"
                       class="btn btn-outline-primary mx-1 @if (app()->getLocale() == $locale)
                btn btn-primary text-white
            @endif inline-flex items-center">
                        {{ strtoupper($locale) }}
                    </a>
                @endforeach

                {{--                <select class="form-select" aria-label="Default select example">--}}
                {{--                    @foreach(config('app.available_locales') as $locale)--}}

                {{--                        <option href="{{ request()->url() }}?language={{ $locale }}"--}}
                {{--                                            class=" @if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center">--}}
                {{--                                [{{ strtoupper($locale) }}]--}}
                {{--                            </option>--}}
                {{--                    @endforeach--}}

                {{--                </select>--}}


                {{--                <select class="form-select mx-1 btn-outline-dark-info" aria-label="Default select example">--}}
                {{--                    <option value="1"><a href="locale/tk">TM</a></option>--}}
                {{--                    <option value="2"><a href="locale/en">ENG</a></option>--}}
                {{--                    <option value="3">RU</option>--}}
                {{--                </select>--}}
                @if(Route::has('login'))
                    {{--                @if(Auth::user())--}}
                    @auth
                        <ul class="navbar-nav navbar-right-wrap me-2 d-flex nav-top-wrap">
                            <li class="dropdown ms-2">
                                <a class="rounded-circle" href="#" role="button" id="dropdownUser"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">

                                        <img alt="avatar" src="{{ asset('storage/' . Auth::user()->image) }}"
                                             class="rounded-circle"/>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                    <div class="dropdown-item">
                                        <div class="d-flex">
                                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                                <img alt="avatar"
                                                     src="{{ asset('storage/' . Auth::user()->image) }}"
                                                     class="rounded-circle"/>
                                            </div>
                                            <div class="ms-3 lh-1">
                                                <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                                <p class="mb-0">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <ul class="list-unstyled">
                                        <li>
                                            <form action="{{route('logout')}}" method="GET" class="inline">
                                                @csrf
                                                @method('POST')
                                                <a class="dropdown-item" href="{{route('logout')}}">
                                                    <i class="fe fe-power me-2"></i>
                                                    Sign Out
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        {{--                @endif--}}
                    @else
                        <div class="d-none d-md-block me-1">
                            <a href="{{ route('login') }}"
                               class="btn btn-outline-secondary">Login</a>
                        </div>
                    @endif
                @endif


            </div>
            <div>
                <button
                    class="navbar-toggler collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbar-default"
                    aria-controls="navbar-default"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar top-bar mt-0"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
        </div>
        <!-- Button -->

        <!-- Collapse -->
        <div class="collapse navbar-collapse text-primary-hover fs-4" id="navbar-default">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('home.index') }}" id="navbarLanding" aria-haspopup="true"
                       aria-expanded="false">{{ __('messages.Main') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarPages"
                       data-bs-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">{{ __('messages.Courses') }}</a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarPages">
                        @if(($courses))
                            @foreach($courses as $course)
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                       href="{{ route('home.courses', $course->id) }}">{{ $course->course }}</a>
                                </li>
                            @endforeach
                        @elseif(is_null($courses))
                            {{ '-' }}
                        @endif

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="{{ route('home.teachers') }}" id="navbarAccount" aria-haspopup="true"
                       aria-expanded="false">{{ __('messages.Teachers') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="{{ route('home.events') }}" id="navbarAccount" aria-haspopup="true"
                       aria-expanded="false">{{ __('messages.Events') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="{{ route('home.videos') }}" id="navbarAccount" aria-haspopup="true"
                       aria-expanded="false">{{ __('messages.Videos') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
