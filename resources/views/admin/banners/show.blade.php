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
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="" class="img-4by3-lg rounded">
                        </div>
                        <div class="card-header">
                            <h3 class="mb-0">{{ __('messages.Banner detail') }}</h3>
                        </div>
                        <div class="ms-3">
                            <h2 class="mb-0 h2 fw-bold">{{$banner->title}}</h2>
                        </div>
                    </div>
                    <div>
                        @can('update', $banner)
                            <a class="btn-icon btn btn-ghost" role="button"
                               href="{{ route('admin.banner.edit', $banner->id) }}">
                                <i class="bi bi-pencil-square h1 mt-2" style="color: orange"></i>
                            </a>
                        @endcan
                    </div>
                </div>
                <hr class="my-5">
                <div>
                    <!-- Form -->
                    <form class="row gx-3" novalidate="">
                        <!-- First name -->
                        <div class="mb-3 col-12 col-md-6">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ __('messages.ID') }}</th>
                                    <td>{{$banner->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Title (tm)') }}</th>
                                    <td>{{$banner->title_tk}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Title (en)') }}</th>
                                    <td>{{$banner->title_en}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Title (ru)') }}</th>
                                    <td>{{$banner->title_ru}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.News (tm)') }}</th>
                                    <td>{{$banner->news_tk}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.News (en)') }}</th>
                                    <td>{{$banner->news_en}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.News (ru)') }}</th>
                                    <td>{{$banner->news_ru}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Description (tm)') }}</th>
                                    <td>{{$banner->description_tk}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Description (en)') }}</th>
                                    <td>{{$banner->description_en}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Description (ru)') }}</th>
                                    <td>{{$banner->description_ru}}</td>
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



