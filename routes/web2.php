<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Course\CreateController;
use App\Http\Controllers\Admin\Course\DeleteController;
use App\Http\Controllers\Admin\Course\EditController;
use App\Http\Controllers\Admin\Course\CourseController as CategoryIndex;
use App\Http\Controllers\Admin\Course\ShowController;
use App\Http\Controllers\Admin\Course\StoreController;
use App\Http\Controllers\Admin\Course\UpdateController;



use App\Http\Controllers\Admin\Main\IndexController as MainIndex;

use App\Http\Controllers\Admin\Teacher\CreateController as TeacherCreate;
use App\Http\Controllers\Admin\Teacher\DeleteController as TeacherDelete;
use App\Http\Controllers\Admin\Teacher\EditController as TeacherEdit;
use App\Http\Controllers\Admin\Teacher\TeacherController as TeacherIndex;
use App\Http\Controllers\Admin\Teacher\ShowController as TeacherShow;
use App\Http\Controllers\Admin\Teacher\StoreController as TeacherStore;
use App\Http\Controllers\Admin\Teacher\UpdateController as TeacherUpdate;

use App\Http\Controllers\Admin\CourseAttribute\CreateController as CourseAttributeCreate;
use App\Http\Controllers\Admin\CourseAttribute\DeleteController as CourseAttributeDelete;
use App\Http\Controllers\Admin\CourseAttribute\EditController as CourseAttributeEdit;
use App\Http\Controllers\Admin\CourseAttribute\CourseAttributeController as CourseAttributeIndex;
use App\Http\Controllers\Admin\CourseAttribute\ShowController as CourseAttributeShow;
use App\Http\Controllers\Admin\CourseAttribute\StoreController as CourseAttributeStore;
use App\Http\Controllers\Admin\CourseAttribute\UpdateController as CourseAttributeUpdate;

use App\Http\Controllers\Admin\User\CreateController as UserCreate;
use App\Http\Controllers\Admin\User\DeleteController as UserDelete;
use App\Http\Controllers\Admin\User\EditController as UserEdit;
use App\Http\Controllers\Admin\User\UserController as UserIndex;
use App\Http\Controllers\Admin\User\ShowController as UserShow;
use App\Http\Controllers\Admin\User\StoreController as UserStore;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdate;

use App\Http\Controllers\Admin\Banner\BannerController as BannerCreate;
use App\Http\Controllers\Admin\Banner\DeleteController as BannerDelete;
use App\Http\Controllers\Admin\Banner\EditController as BannerEdit;
use App\Http\Controllers\Admin\Banner\IndexController as BannerIndex;
use App\Http\Controllers\Admin\Banner\ShowController as BannerShow;
use App\Http\Controllers\Admin\Banner\StoreController as BannerStore;
use App\Http\Controllers\Admin\Banner\UpdateController as BannerUpdate;

use App\Http\Controllers\Admin\Event\CreateController as EventCreate;
use App\Http\Controllers\Admin\Event\DeleteController as EventDelete;
use App\Http\Controllers\Admin\Event\EditController as EventEdit;
use App\Http\Controllers\Admin\Event\EventController as EventIndex;
use App\Http\Controllers\Admin\Event\ShowController as EventShow;
use App\Http\Controllers\Admin\Event\StoreController as EventStore;
use App\Http\Controllers\Admin\Event\UpdateController as EventUpdate;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\IndexController;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


//Route::get('/users/{course:slug}', function (Course $course) {
//    return $course;
//});

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('home.index');
    Route::get('/home', [HomeController::class, 'index'])->name('home.home');
    Route::get('/teachers', [IndexController::class, 'teachers'])->name('home.teachers');
    Route::get('/events', [IndexController::class, 'events'])->name('home.events');
    Route::get('/courses/{course}', [IndexController::class, 'courses'])->name('home.courses');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin' ], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [MainIndex::class, 'index'])->name('admin.home.index');
    });

    Route::group(['namespace' => 'Course', 'prefix' => 'courses'], function () {
        Route::get('/', [CategoryIndex::class, 'index'])->name('admin.course.index');
        Route::get('/create', [CreateController::class, 'index'])->name('admin.course.create');
        Route::post('/', [StoreController::class, 'index'])->name('admin.course.store');
        Route::get('/{course}', [ShowController::class, 'index'])->name('admin.course.show');
        Route::get('/{course}/edit', [EditController::class, 'index'])->name('admin.course.edit');
        Route::patch('/{course}', [UpdateController::class, 'index'])->name('admin.course.update');
        Route::delete('/{course}', [DeleteController::class, 'index'])->name('admin.course.delete');
    });

    Route::group(['namespace' => 'CourseAttribute', 'prefix' => 'stages'], function () {
        Route::get('/', [CourseAttributeIndex::class, 'index'])->name('admin.courseAttribute.index');
        Route::get('/create', [CourseAttributeCreate::class, 'index'])->name('admin.courseAttribute.create');
        Route::post('/', [CourseAttributeStore::class, 'index'])->name('admin.courseAttribute.store');
        Route::get('/{courseAttribute}', [CourseAttributeShow::class, 'index'])->name('admin.courseAttribute.show');
        Route::get('/{courseAttribute}/edit', [CourseAttributeEdit::class, 'index'])->name('admin.courseAttribute.edit');
        Route::patch('/{courseAttribute}', [CourseAttributeUpdate::class, 'index'])->name('admin.courseAttribute.update');
        Route::delete('/{courseAttribute}', [CourseAttributeDelete::class, 'index'])->name('admin.courseAttribute.delete');

    });

    Route::group(['namespace' => 'Banner', 'prefix' => 'banners'], function () {
        Route::get('/', [BannerIndex::class, 'index'])->name('admin.banner.index');
        Route::get('/create', [BannerCreate::class, 'index'])->name('admin.banner.create');
        Route::post('/', [BannerStore::class, 'index'])->name('admin.banner.store');
        Route::get('/{banner}', [BannerShow::class, 'index'])->name('admin.banner.show');
        Route::get('/{banner}/edit', [BannerEdit::class, 'index'])->name('admin.banner.edit');
        Route::patch('/{banner}', [BannerUpdate::class, 'index'])->name('admin.banner.update');
        Route::delete('/{banner}', [BannerDelete::class, 'index'])->name('admin.banner.delete');

    });

    Route::group(['namespace' => 'Teacher', 'prefix' => 'teachers'], function () {
        Route::get('/', [TeacherIndex::class, 'index'])->name('admin.teacher.index');
        Route::get('/create', [TeacherCreate::class, 'index'])->name('admin.teacher.create');
        Route::post('/', [TeacherStore::class, 'index'])->name('admin.teacher.store');
        Route::get('/{teacher}', [TeacherShow::class, 'index'])->name('admin.teacher.show');
        Route::get('/{teacher}/edit', [TeacherEdit::class, 'index'])->name('admin.teacher.edit');
        Route::patch('/{teacher}', [TeacherUpdate::class, 'index'])->name('admin.teacher.update');
        Route::delete('/{teacher}', [TeacherDelete::class, 'index'])->name('admin.teacher.delete');

    });

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', [UserIndex::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserCreate::class, 'index'])->name('admin.user.create');
        Route::post('/', [UserStore::class, 'index'])->name('admin.user.store');
        Route::get('/{user}', [UserShow::class, 'index'])->name('admin.user.show');
        Route::get('/{user}/edit', [UserEdit::class, 'index'])->name('admin.user.edit');
        Route::patch('/{user}', [UserUpdate::class, 'index'])->name('admin.user.update');
        Route::delete('/{user}', [UserDelete::class, 'index'])->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Event', 'prefix' => 'events'], function () {
        Route::get('/', [EventIndex::class, 'index'])->name('admin.event.index');
        Route::get('/create', [EventCreate::class, 'index'])->name('admin.event.create');
        Route::post('/', [EventStore::class, 'index'])->name('admin.event.store');
        Route::get('/{event}', [EventShow::class, 'index'])->name('admin.event.show');
        Route::get('/{event}/edit', [EventEdit::class, 'index'])->name('admin.event.edit');
        Route::patch('/{event}', [EventUpdate::class, 'index'])->name('admin.event.update');
        Route::delete('/{event}', [EventDelete::class, 'index'])->name('admin.event.delete');

    });
});





