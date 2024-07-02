<div class="ms-auto d-flex">

    <div class="mt-2 m-2">{{ __('auth.hi_name', ['name' => auth()->user()->name]) }}</div>

    <div class="dropdown">
        <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center"
                type="button"
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
{{--           class="btn btn-outline-primary mx-1">--}}
            class="btn btn-outline-primary mx-1 @if (app()->getLocale() == $locale)
                btn btn-primary text-white
            @endif inline-flex items-center" >
            {{ strtoupper($locale) }}
        </a>
    @endforeach
    <ul class="navbar-nav navbar-right-wrap ms-2 d-flex nav-top-wrap">
        <!-- List -->
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
                        <a class="dropdown-item" href="">
                            <i class="fe fe-user me-2"></i>
                            Profile
                        </a>
                    </li>
                </ul>
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
</div>
