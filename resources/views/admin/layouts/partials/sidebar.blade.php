<ul class="navbar-nav flex-column" id="sideNavbar">
    <li class="nav-item mt-2">
        <a class="nav-link primary-hover {{ Request::routeIs('admin.home.*') ? 'active' : '' }}" href="{{ route('admin.home.index') }}">
                    <span>
                        <i class="bi bi-house-fill"></i>
                    </span>
            <span class="ms-2">{{ __('messages.Main') }}</span>
        </a>
    </li>
    <li class="nav-item mt-2">
        <a class="nav-link primary-hover {{ Request::routeIs('admin.banner.*') ? 'active' : '' }}" href="{{ route('admin.banner.index') }}">
                    <span>
                        <i class="bi bi-card-image"></i>
                    </span>
            <span class="ms-2">{{ __('messages.Banner') }}</span>
        </a>
    </li>
    <li class="nav-item mt-2">
        <a class="nav-link primary-hover {{ Request::routeIs('admin.course.*') ? 'active' : '' }}" href="{{ route('admin.course.index') }}">
                    <span>
                        <i class="bi bi-postcard-fill"></i>
                    </span>
            <span class="ms-2">{{ __('messages.Courses') }}</span>
        </a>
    </li>
    <li class="nav-item mt-2">
        <a class="nav-link primary-hover {{ Request::routeIs('admin.courseAttribute.*') ? 'active' : '' }}" href="{{ route('admin.courseAttribute.index') }}">
                    <span>
                        <i class="bi bi-reception-4"></i>
                    </span>
            <span class="ms-2">{{ __('messages.Stages') }}</span>
        </a>
    </li>
    <li class="nav-item mt-2">
        <a class="nav-link primary-hover {{ Request::routeIs('admin.teacher.*') ? 'active' : '' }}" href="{{ route('admin.teacher.index') }}">
                    <span>
                        <i class="bi bi-person-video3"></i>
                    </span>
            <span class="ms-2">{{ __('messages.Teachers') }}</span>
        </a>
    </li>
    <li class="nav-item mt-2">
        <a class="nav-link primary-hover {{ Request::routeIs('admin.event.*') ? 'active' : '' }}" href="{{ route('admin.event.index') }}">
                    <span>
                        <i class="bi bi-suit-diamond-fill"></i>
                    </span>
            <span class="ms-2">{{ __('messages.Events') }}</span>
        </a>
    </li>
    <li class="nav-item mt-2">
        <a class="nav-link primary-hover {{ Request::routeIs('admin.video.*') ? 'active' : '' }}" href="{{ route('admin.video.index') }}">
                    <span>
                        <i class="bi bi-suit-diamond-fill"></i>
                    </span>
            <span class="ms-2">{{ __('messages.Videos') }}</span>
        </a>
    </li>
{{--    @if((Auth()->user()->role_id == 3) || (Auth()->user()->role_id == 2))--}}

        <li class="nav-item mt-2">
            <a class="nav-link primary-hover {{ Request::routeIs('admin.user.*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
                    <span>
                        <i class="bi bi-person-fill"></i>
                    </span>
                <span class="ms-2">{{ __('messages.Users') }}</span>
            </a>
        </li>
{{--    @endif--}}
</ul>
