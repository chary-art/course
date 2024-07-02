<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Course;
use App\Models\CourseAttribute;
use App\Models\Event;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
//        $banner_photos = Banner::pluck('image');
//        $banner = DB::table('banners')->first();
        $banners = Banner::all();
        $events = Event::all();
        $coursesAttributes = CourseAttribute::all();
        $courses = Course::all();
        $teachers = Teacher::all();
        $users = User::all();
        return view('home.welcome', compact('banners', 'coursesAttributes', 'events', 'courses', 'teachers', 'users',));
    }

    public function teachers()
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('home.navbar.teachers', compact('teachers', 'courses'));
    }

    public function courses(Course $course)
    {
        $courses = Course::all();
        $course_names = CourseAttribute::get()->where('course_id', $course->id);
        return view('home.navbar.courses', compact('courses', 'course_names'));
    }

    public function events()
    {
        $events = Event::cursorPaginate(3);
        $courses = Course::all();
        return view('home.navbar.events', compact('events', 'courses'));
    }
    public function videos(Video $id)
    {
//        $events = Event::cursorPaginate(3);
        $videos = Video::all();
        $courses = Course::all();
        return view('home.navbar.videos', compact('videos', 'courses', 'id'));
    }
    public function view($file)
    {
        $courses = Course::all();
        $file = Video::find($file);
        return view('home.navbar.view', compact('file', 'courses'));
    }

//    public function navbar()
//    {
//        $courses = Course::all();
//        return view('layouts.partials.navbar', compact('courses'));
//    }

    public function dashboard()
    {
//        $roles = Role::getRoles();
        $users = User::all();
        return view('dashboard', compact('users'));
    }

//    public function download(Request $request)
//    {
//        $videos = Video::all();
//        if(Storage::disk('public')->exists("pdf/$request->file")) {
//            $path = Storage::disk('public')->path("pdf/$request->file");
//            $content = file_get_contents($path);
//            return response($content)->withHeaders([
//                'Content-Type' => mime_content_type($path)
//            ]);
//        }
//        return redirect('/404')->view('video-upload', compact('videos'));
//    }
    /* get file from public storage */




}
