<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\StoreRequest;
use App\Http\Requests\Admin\Course\UpdateRequest;
use App\Models\Course;
use App\Models\Teacher;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $this->authorize('create', Course::class);
        return view('admin.courses.create');
    }

    public function edit(Course $course)
    {
        $this->authorize('update', $course);
        return view('admin.courses.edit', compact('course'));
    }

    public function show(Course $course)
    {
        $this->authorize('view', $course);
        return view('admin.courses.show', compact('course'));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Course::class);
        $data = $request->validated();
        Course::create($data);
        return redirect()->route('admin.course.index')
            ->with('successful_message', trans('messages.The post has been added successfully!'));
    }

    public function update(UpdateRequest $request, Course $course)
    {
        $this->authorize('update', $course);
        $data = $request->validated();
        $course->update($data);
        return redirect()->route('admin.course.show', compact('course'))
            ->with('update', trans('messages.The post has been updated successfully!'));

    }

    public function delete(Course $course)
    {
        $this->authorize('delete', $course);
        $course->delete();
        return redirect()->route('admin.course.index');

    }
}
