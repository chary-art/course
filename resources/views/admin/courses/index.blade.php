@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="border-bottom pb-3 mb-3 d-md-flex">
            @if(Session::has('successful_message'))
                <div id="alert" class="alert alert-success">
                    {{ Session::get('successful_message') }}
                </div>
            @endif
        </div>
        <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
                <h1 class="mb-1 h2 fw-bold">{{ __('messages.Courses') }}</h1>
            </div>
            <div>
                @can('create', App\Models\Course::class)
                    <a href="{{ route('admin.course.create') }}"
                       class="btn btn-primary">{{ __('messages.Add new course') }}
                    </a>
                @endcan
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Table -->
                    <div class="table-responsive border-0 overflow-y-hidden">
                        <table
                            class="table mb-0 text-nowrap dataTable table-centered table-hover dtr-inline text-center">
                            <thead class="table-light">
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Courses') }}</th>
                                <th>{{ __('messages.Teachers') }}</th>
                                <th>{{ __('messages.Stages') }}</th>
                                <th></th>
                                <th>{{ __('messages.Delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr class="accordion-toggle collapsed" id="accordion1" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion1" data-bs-target="#collapseOne">
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->course }}</td>
                                    <td>
                                        @foreach($course->teachers as $teacher)
                                            <a class="dropdown-item"
                                               href="{{ route('admin.teacher.show', $teacher->id) }}">
                                                <h5 class="text-primary"> {{ $teacher->name }}</h5>
                                            </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($course->courseAttributes as $courseAttribute)
                                            <a class="dropdown-item"
                                               href="{{ route('admin.courseAttribute.show', $courseAttribute->id) }}">
                                                <h5 class="text-primary"> {{ $courseAttribute->stage }}</h5>
                                            </a>
                                        @endforeach
                                    </td>

                                    <td style="padding: 0;width: 12%">
                                        @can('view', $course)
                                            <a class="" href="{{ route('admin.course.show', $course->id) }}">
                                                <button type="submit"
                                                        class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</button>
                                            </a>
                                        @endcan
                                        @can('update', $course)
                                            <a class="btn-icon btn btn-ghost" role="button"
                                               href="{{ route('admin.course.edit', $course->id) }}">
                                                <i class="bi bi-pencil-square h1 mt-2" style="color: orange"></i>
                                            </a>
                                        @endcan
                                    </td>


                                    <td>
                                        @can('delete', $course)

                                            <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                               href="" role="button"
                                               id="courseDropdown1" data-bs-toggle="dropdown"
                                               data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                            <span class="dropdown-header"></span>
                                                    <a class="dropdown-item" href="">
                                                     <i class="fe fe-trash dropdown-item-icon"></i>
                                                     <form action="{{ route('admin.course.delete', $course->id) }}"
                                                           method="POST">
                                                            @csrf
                                                         @method('delete')
                                                            <button type="submit"
                                                                    class="btn btn-danger mb-2 btn-sm">{{ __('messages.Delete') }}</button>
                                                     </form>
                                                </a>
                                            </span>
                                        </span>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
