<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Teacher::class => \App\Policies\TeacherPolicy::class,
        \App\Models\Event::class => \App\Policies\EventPolicy::class,
        \App\Models\CourseAttribute::class => \App\Policies\CourseAttributePolicy::class,
        \App\Models\Course::class => \App\Policies\CoursePolicy::class,
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Banner::class => \App\Policies\BannerPolicy::class,
        \App\Models\Video::class => \App\Policies\VideoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
