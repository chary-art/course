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
                            <img src="{{ asset('storage/' . $event->image) }}" alt="" class="img-4by3-lg rounded">
                        </div>
                        <div class="">
                            <h3 class="mb-0 m-2">{{ __('messages.Event Details') }}</h3>
                        </div>
                    </div>
                    <div>
                        @can('update', $event)
                        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-warning btn-sm">{{ __('messages.Edit') }}</a>
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
                                        <td>{{$event->id}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('messages.Title (tm)') }}</th>
                                        <td>{{$event->title_tk}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('messages.Title (ru)') }}</th>
                                        <td>{{$event->title_ru}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('messages.Title (en)') }}</th>
                                        <td>{{$event->title_en}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('messages.Description (tm)') }}</th>
                                        <td>{{$event->description_tk}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('messages.Description (ru)') }}</th>
                                        <td>{{$event->description_ru}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('messages.Description (en)') }}</th>
                                        <td>{{$event->description_en}}</td>
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



