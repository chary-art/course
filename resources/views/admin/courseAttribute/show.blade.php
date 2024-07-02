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
                        <div>
                            <h3 class="mb-0">Stage:</h3>
                        </div>

                        <div class="ms-3">
                            <h3 class="mb-0 h2 fw-bold">{{$courseAttribute->stage}}</h3>
                        </div>
                    </div>
                    <div>
                        @can('update', $courseAttribute)
                            <a href="{{ route('admin.courseAttribute.edit', $courseAttribute->id) }}"
                               class="btn btn-warning btn-sm">Edit</a>
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
                                    <td>{{$courseAttribute->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Course') }}</th>
                                    @if(($courseAttribute->course) == !null)
                                        <td>{{$courseAttribute->course->course}}</td>
                                    @elseif(is_null($courseAttribute->course))
                                        {{ '-' }}
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Stage (tm)') }}</th>
                                    <td>{{$courseAttribute->stage_tk}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Stage (en)') }}</th>
                                    <td>{{$courseAttribute->stage_en}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Stage (ru)') }}</th>
                                    <td>{{$courseAttribute->stage_ru}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Description (tm)') }}</th>
                                    <td>{{$courseAttribute->description_tk}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Description (en)') }}</th>
                                    <td>{{$courseAttribute->description_en}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Description (ru)') }}</th>
                                    <td>{{$courseAttribute->description_ru}}</td>
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
