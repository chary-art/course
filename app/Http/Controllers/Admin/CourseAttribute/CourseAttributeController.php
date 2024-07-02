<?php

namespace App\Http\Controllers\Admin\CourseAttribute;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseAttribute\StoreRequest;
use App\Http\Requests\Admin\CourseAttribute\UpdateRequest;
use App\Models\Course;
use App\Models\CourseAttribute;

class CourseAttributeController extends Controller
{
    public function index() {
        $courseAttributes = CourseAttribute::all();
        return view('admin.courseAttribute.index', compact('courseAttributes'));
    }

    public function create()
    {
        $this->authorize('create', CourseAttribute::class);
        $courses = Course::all();
        return view('admin.courseAttribute.create', compact('courses'));
    }

    public function edit(CourseAttribute $courseAttribute)
    {
        $this->authorize('create', $courseAttribute);
        $courses = Course::all();
        $selectedCourse = CourseAttribute::pluck('course_id');
//        dd($selectedCourse);
        return view('admin.courseAttribute.edit', compact('courseAttribute', 'courses', 'selectedCourse'));
    }

    public function show(CourseAttribute $courseAttribute)
    {
        $this->authorize('create', $courseAttribute);
        return view('admin.courseAttribute.show', compact('courseAttribute'));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', CourseAttribute::class);
        $data = $request->validated();
        CourseAttribute::create($data);
//        dd($data);
        return redirect()->route('admin.courseAttribute.index')
            ->with('successful_message', trans('messages.The post has been added successfully!'));
    }

    public function update(UpdateRequest $request, CourseAttribute $courseAttribute)
    {
        $this->authorize('create', $courseAttribute);
        $data = $request->validated();
        $courseAttribute->update($data);
        return redirect()->route('admin.courseAttribute.show', compact('courseAttribute'))
            ->with('update', trans('messages.The post has been updated successfully!'));
    }

    public function delete(CourseAttribute $courseAttribute)
    {
        $this->authorize('create', $courseAttribute);
        $courseAttribute->delete();
        return redirect()->route('admin.courseAttribute.index');

    }
}
