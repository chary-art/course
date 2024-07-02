<?php

use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Admin\CourseAttribute\CourseAttributeController;
use App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Admin\Main\IndexController as MainIndex;
use App\Http\Controllers\Admin\Teacher\TeacherController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Video\VideoController;
//use App\Http\Controllers\VideoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::group([
//    'prefix' => '{lang}',
//    'where' => ['lang', '[a-zA-Z]{2}']
//], function (){
//    Route::get('/', [IndexController::class, 'index'])->name('home.index');
//});

//Interface
//Route::get('{lang}/neo', [IndexController::class, 'neo'])
//    ->where('lang', '[a-zA-Z]{2}')
//    ->name('home.index');

//Route::get('{lang}/neo', [LocalizationController::class, 'setLang'])
//    ->where('lang', '[a-zA-Z]{2}')
//    ->name('home.index');


Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('home.index');
//    Route::get('/home', [HomeController::class, 'index'])->name('home.home');
    Route::get('/teachers', [IndexController::class, 'teachers'])->name('home.teachers');
    Route::get('/events', [IndexController::class, 'events'])->name('home.events');
    Route::get('/videos', [IndexController::class, 'videos'])->name('home.videos');
    Route::get('/videos/{file}', [IndexController::class, 'view'])->name('home.view');
//    Route::get('{file_path}', [VideoController::class, 'download'])->name('home.videos.download');
    Route::get('/courses/{course}', [IndexController::class, 'courses'])->name('home.courses');
});


//Route::get('/index', [PageController::class, 'index']);
//Route::get('/uploadpage', [PageController::class, 'uploadpage'])->name('uploadpage');
//Route::get('/show', [PageController::class, 'show'])->name('show');
//Route::post('/uploadproduct', [PageController::class, 'store'])->name('store');
//Route::get('/download/{video}', [PageController::class, 'download'])->name('download');



// ADMIN DASHBOARD
Route::middleware(['auth', 'verified'])->group(function () {
    Route::group([], function () {
        Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');
    });

    Route::group([ 'namespace' => 'Admin'], function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



        Route::group(['prefix' => 'admin', 'as' => 'admin.',], function () {
            Route::group(['namespace' => 'Main'], function () {
                Route::get('/', [MainIndex::class, 'index'])->name('home.index');
            });

            Route::group(['namespace' => 'Video', 'prefix' => 'video'], function () {
                Route::get('/', [VideoController::class, 'index'])->name('video.index');
                Route::get('create', [VideoController::class, 'create'])->name('video.create');
                Route::post('/', [VideoController::class, 'store'])->name('video.store');
                // Route::get('{video}/edit/{media}', [VideoController::class, 'download'])->name('download.video');
                Route::get('/{video}', [VideoController::class, 'show'])->name('video.show');
                Route::get('/{video}/edit', [VideoController::class, 'edit'])->name('video.edit');
                Route::patch('/{video}', [VideoController::class, 'update'])->name('video.update');
                Route::delete('/{video}', [VideoController::class, 'delete'])->name('video.delete');
            });

            Route::group(['namespace' => 'Course', 'prefix' => 'courses'], function () {
                Route::get('/', [CourseController::class, 'index'])->name('course.index');
                Route::get('/create', [CourseController::class, 'create'])->name('course.create');
                Route::post('/', [CourseController::class, 'store'])->name('course.store');
                Route::get('/{course}', [CourseController::class, 'show'])->name('course.show');
                Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
                Route::patch('/{course}', [CourseController::class, 'update'])->name('course.update');
                Route::delete('/{course}', [CourseController::class, 'delete'])->name('course.delete');
            });
            Route::group(['namespace' => 'CourseAttribute', 'prefix' => 'stages'], function () {
                Route::get('/', [CourseAttributeController::class, 'index'])->name('courseAttribute.index');
                Route::get('/create', [CourseAttributeController::class, 'create'])->name('courseAttribute.create');
                Route::post('/', [CourseAttributeController::class, 'store'])->name('courseAttribute.store');
                Route::get('/{courseAttribute}', [CourseAttributeController::class, 'show'])->name('courseAttribute.show');
                Route::get('/{courseAttribute}/edit', [CourseAttributeController::class, 'edit'])->name('courseAttribute.edit');
                Route::patch('/{courseAttribute}', [CourseAttributeController::class, 'update'])->name('courseAttribute.update');
                Route::delete('/{courseAttribute}', [CourseAttributeController::class, 'delete'])->name('courseAttribute.delete');
            });
            Route::group(['namespace' => 'Banner', 'prefix' => 'banners'], function () {
                Route::get('/', [BannerController::class, 'index'])->name('banner.index');
                Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
                Route::post('/', [BannerController::class, 'store'])->name('banner.store');
                Route::get('/{banner}', [BannerController::class, 'show'])->name('banner.show');
                Route::get('/{banner}/edit', [BannerController::class, 'edit'])->name('banner.edit');
                Route::patch('/{banner}', [BannerController::class, 'update'])->name('banner.update');
                Route::delete('/{banner}', [BannerController::class, 'delete'])->name('banner.delete');
            });
            Route::group(['namespace' => 'Teacher', 'prefix' => 'teachers'], function () {
                Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
                Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create');
                Route::post('/', [TeacherController::class, 'store'])->name('teacher.store');
                Route::get('/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
                Route::get('/{teacher}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
                Route::patch('/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
                Route::delete('/{teacher}', [TeacherController::class, 'delete'])->name('teacher.delete');
            });
            Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
                Route::get('/', [UserController::class, 'index'])->name('user.index');
                Route::get('/create', [UserController::class, 'create'])->name('user.create');
                Route::post('/', [UserController::class, 'store'])->name('user.store');
                Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
                Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
                Route::patch('/{user}', [UserController::class, 'update'])->name('user.update');
                Route::delete('/{user}', [UserController::class, 'delete'])->name('user.delete');
            });
            Route::group(['namespace' => 'Event', 'prefix' => 'events'], function () {
                Route::get('/', [EventController::class, 'index'])->name('event.index');
                Route::get('/create', [EventController::class, 'create'])->name('event.create');
                Route::post('/', [EventController::class, 'store'])->name('event.store');
                Route::get('/{event}', [EventController::class, 'show'])->name('event.show');
                Route::get('/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
                Route::patch('/{event}', [EventController::class, 'update'])->name('event.update');
                Route::delete('/{event}', [EventController::class, 'delete'])->name('event.delete');
            });
        });
    });
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
require __DIR__ . '/auth.php';

