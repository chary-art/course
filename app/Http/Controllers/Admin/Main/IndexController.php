<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $course_count = Course::get('id')->count();
        $teacher_count = Teacher::get('id')->count();
        $user_count = User::get('id')->count();
        $users = User::all();
        $banner_count = Banner::get('id')->count();
        return view('admin.home.index', compact('course_count', 'teacher_count', 'user_count', 'users', 'banner_count'));
    }

    public function user()
    {
        return view('user');
    }


}

