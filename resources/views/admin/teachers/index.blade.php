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
                <h1 class="mb-1 h2 fw-bold">{{ __('messages.Teachers') }}</h1>
            </div>
            <div>
                @can('create', App\Models\Teacher::class)
                    <a href="{{ route('admin.teacher.create') }}"
                       class="btn btn-primary">{{ __('messages.Add Teacher') }}</a>
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
                                <th>{{ __('messages.Image') }}</th>
                                <th>{{ __('messages.Name & Surname') }}</th>
                                <th>{{ __('messages.Course')}}</th>
                                <th>{{ __('messages.Experience') }}</th>
                                <th>{{ __('messages.Graduate degree') }}</th>
                                <th></th>
                                <th>{{ __('messages.Delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr class="accordion-toggle collapsed" id="accordion1" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion1" data-bs-target="#collapseOne">
                                    <td>{{ $teacher->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="position-relative">
                                                <img src="{{ asset('storage/' . $teacher->image) }}" alt=""
                                                     class="img-4by3-lg rounded">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $teacher->name }} {{ $teacher->surname }}</td>
                                    <td>
                                        @if(($teacher->course) == !null)
                                            <a href="{{ route('admin.teacher.show', $teacher->course->id) }}"><h5
                                                    class="text-primary">{{ Str::limit( $teacher->course->course, 40) }}</h5>
                                            </a>
                                        @elseif(is_null($teacher->course))
                                            {{ '-' }}
                                        @endif
                                    </td>
                                    <td>{{ Str::limit( $teacher->experience, 40) }} </td>
                                    <td>{{ Str::limit( $teacher->degree, 40) }} </td>
                                    <td style="padding: 0;width: 12%">
                                        @can('delete', $teacher)
                                            <a class="" href="{{ route('admin.teacher.show', $teacher->id) }}">
                                                <button type="submit"
                                                        class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</button>
                                            </a>
                                        @endcan
                                        @can('update', $teacher)
                                            <a class="btn-icon btn btn-ghost" role="button"
                                               href="{{ route('admin.teacher.edit', $teacher->id) }}">
                                                <i class="bi bi-pencil-square h1 mt-2" style="color: orange"></i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('delete', $teacher)
                                            <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                               href="" role="button"
                                               id="courseDropdown1" data-bs-toggle="dropdown"
                                               data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="bi bi-trash3-fill"></i>

                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                            <span class="dropdown-header">Action</span>
                                                <a class="dropdown-item" href="">
                                                     <i class="fe fe-trash dropdown-item-icon"></i>
                                                     <form action="{{ route('admin.teacher.delete', $teacher->id) }}"
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
