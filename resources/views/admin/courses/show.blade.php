@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-9 col-md-8 col-12">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="border-bottom pb-3 mb-3 d-md-flex">
                    @if(Session::has('update'))
                        <div id="alert" class="alert alert-success">
                            {{ Session::get('update') }}
                        </div>
                    @endif
                </div>
                <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                        <div class="card-header">
                            <h3 class="mb-0">{{ __('messages.Course Details') }}</h3>
                        </div>

                        <div class="ms-3">
                            <h2 class="mb-0 h2 fw-bold">{{$course->course}}</h2>
                        </div>
                    </div>

                    <div>
                        @can('update', $course)
                            <a class="btn-icon btn btn-ghost" role="button"
                               href="{{ route('admin.course.edit', $course->id) }}">
                                <i class="bi bi-pencil-square h1 mt-2" style="color: orange"></i>
                            </a>
                        @endcan
                    </div>

                </div>

                <hr class="my-5">
                <div>
                    <form class="row gx-3" novalidate="">
                        <div class="mb-3 col-12 col-md-6">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ __('messages.ID') }}</th>
                                    <td>{{$course->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Course Name (tm)') }}</th>
                                    <td>{{$course->course_tk}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Course Name (ru)') }}</th>
                                    <td>{{$course->course_ru}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Course Name (en)') }}</th>
                                    <td>{{$course->course_en}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



