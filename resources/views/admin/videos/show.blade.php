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
                        </div>
                        <div class="card-header">
                            <h3 class="mb-0">{{ __('messages.video detail') }}</h3>
                        </div>
                        <div class="ms-3">
                            <h2 class="mb-0 h2 fw-bold">{{$video->title}}</h2>
                        </div>
                    </div>
                    <div>
                        @can('update', $video)
                            <a class="btn-icon btn btn-ghost" role="button"
                               href="{{ route('admin.video.edit', $video->id) }}">
                                <i class="bi bi-pencil-square h1 mt-2" style="color: orange"></i>
                            </a>
                        @endcan
                    </div>
                </div>
                <hr class="my-5">
                <div class="position-relative">
                    <video width="320" height="240" controls>
                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                    </video>
                </div>
                <div>
                    <!-- Form -->
                    <form class="row gx-3" novalidate="">
                        <!-- First name -->
                        <div class="mb-3 col-12 col-md-6">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ __('messages.ID') }}</th>
                                    <td>{{$video->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Title (tm)') }}</th>
                                    <td>{{$video->title_tk}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Title (ru)') }}</th>
                                    <td>{{$video->title_ru}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Title (en)') }}</th>
                                    <td>{{$video->title_en}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Teacher') }}</th>
                                    @if(($video->teacher) == !null)
                                        <td>{{$video->teacher->name}}</td>
                                    @elseif(is_null($video->teacher))
                                        {{ '-' }}
                                    @endif
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



