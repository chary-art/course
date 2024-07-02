<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Teacher\StoreRequest;
use App\Http\Requests\Admin\Teacher\UpdateRequest;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index() {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $this->authorize('create', Teacher::class);
        $courses = Course::all();
        return view('admin.teachers.create', compact( 'courses'));
    }

    public function edit(Teacher $teacher)
    {
        $this->authorize('update', $teacher);
        $courses = Course::all();
        $selectedCourse = Teacher::first()->course_id;
        return view('admin.teachers.edit', compact('teacher', 'courses', 'selectedCourse'));
    }

    public function show(Teacher $teacher)
    {
        $this->authorize('view', $teacher);
        return view('admin.teachers.show', compact('teacher'));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Teacher::class);
        $data = $request->validated();
        if(isset($data['image']))
        {
            $data['image'] = Storage::disk('public')->put('/images/teacher', $data['image']);
        }
        Teacher::create($data);
        return redirect()->route('admin.teacher.index')
            ->with('successful_message', trans('messages.The post has been added successfully!'));
    }

    public function update(UpdateRequest $request, Teacher $teacher)
    {
        $this->authorize('update', $teacher);
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = Storage::disk('public')->put('/images/teacher', $data['image']);
        }
        $teacher->update($data);
        return redirect()->route('admin.teacher.show', compact('teacher'))
            ->with('update', trans('messages.The post has been updated successfully!'));
    }

    public function delete(Teacher $teacher)
    {
        $this->authorize('delete', $teacher);
        $teacher->delete();
        return redirect()->route('admin.teacher.index');

    }
}
