<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                    <div>
                        <span class="fs-6 text-uppercase fw-semibold ls-md">{{ __('messages.Courses') }}</span>
                    </div>
                    <div>
                        <span class="fe fe-book-open fs-3 text-primary"></span>
                    </div>
                </div>
                <h2 class="fw-bold mb-1">{{ $course_count }}</h2>
                <span class="text-danger fw-semibold">{{ $course_count + 5 }}+</span>
                <span class="ms-1 fw-medium">{{ __('messages.Number of pending') }}</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                    <div>
                        <span class="fs-6 text-uppercase fw-semibold ls-md">{{ __('messages.Users') }}</span>
                    </div>
                    <div>
                        <span class="fe fe-users fs-3 text-primary"></span>
                    </div>
                </div>
                <h2 class="fw-bold mb-1">{{ $user_count }}</h2>
                <span class="text-success fw-semibold">
                                        <i class="fe fe-trending-up me-1"></i>
                                        +{{ $user_count + 5 }}
                                    </span>
                <span class="ms-1 fw-medium">{{ __('messages.Students') }}</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                    <div>
                        <span class="fs-6 text-uppercase fw-semibold ls-md">{{ __('messages.Teachers') }}</span>
                    </div>
                    <div>
                        <span class="fe fe-user-check fs-3 text-primary"></span>
                    </div>
                </div>
                <h2 class="fw-bold mb-1">{{ $teacher_count }}</h2>
                <span class="text-success fw-semibold">
                                        <i class="fe fe-trending-up me-1"></i>
                                        +{{ $teacher_count + 5 }}
                                    </span>
                <span class="ms-1 fw-medium">{{ __('messages.Instructor') }}</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                    <div>
                        <span class="fs-6 text-uppercase fw-semibold ls-md">{{ __('messages.Banner') }}</span>
                    </div>
                    <div>
                        <span class="fe fe-user-check fs-3 text-primary"></span>
                    </div>
                </div>
                <h2 class="fw-bold mb-1">{{ $banner_count }}</h2>
                <span class="text-success fw-semibold">
                                        <i class="fe fe-trending-up me-1"></i>
                                        +{{ $banner_count + 2 }}
                                    </span>
                <span class="ms-1 fw-medium"></span>
            </div>
        </div>
    </div>
</div>
