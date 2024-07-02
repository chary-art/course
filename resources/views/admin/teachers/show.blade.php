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
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $teacher->image) }}" alt="" class="img-4by3-lg rounded">
                        </div>
                        <div class="card-header">
                            <h3 class="mb-0">{{ __('messages.Teacher Detail') }}</h3>
                        </div>
                        <div class="ms-3">
                            <h2 class="mb-0 h2 fw-bold">{{$teacher->name . ' ' . $teacher->surname}}</h2>
                        </div>
                    </div>
                    <div>
                        @can('update', $teacher)
                            <a class="btn-icon btn btn-ghost" role="button"
                               href="{{ route('admin.teacher.edit', $teacher->id) }}">
                                <i class="bi bi-pencil-square h1 mt-2" style="color: orange"></i>
                            </a>
                        @endcan
                    </div>
                </div>
                <hr class="my-5">
                <div>
                    <form class="row gx-3" novalidate="">
                        <!-- First name -->
                        <div class="mb-3 col-12 col-md-6">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ __('messages.ID') }}</th>
                                    <td>{{$teacher->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Name') }}</th>
                                    <td>{{$teacher->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Surname') }}</th>
                                    <td>{{$teacher->surname}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Course') }}</th>
                                    @if(($teacher->course) == !null)
                                        <td>{{$teacher->course->course}}</td>
                                    @elseif(is_null($teacher->course))
                                        {{ '-' }}
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.University Major') }}</th>
                                    <td>{{$teacher->major}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Phone') }}</th>
                                    <td>{{$teacher->phone}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Address') }}</th>
                                    <td>{{$teacher->address}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Experience') }}</th>
                                    <td>{{$teacher->experience}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Graduate degree') }}</th>
                                    <td>{{$teacher->degree}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Hobby') }}</th>
                                    <td>{{$teacher->hobby}}</td>
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
