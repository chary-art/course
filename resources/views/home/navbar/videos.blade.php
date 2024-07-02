@extends('layouts.app')

@section('home')
    <div class="col">
        <h2 class="h1 fw-bold text-center mt-3">
            <span class="text-primary text-center">{{ __('messages.Videos') }}</span>
        </h2>
    </div>
    <section class="py-1 bg-gray-100">
        <div class="container my-lg-8 ">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-12 mb-5">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th>{{ __('messages.ID') }}</th>
                                    <th>{{ __('messages.Teachers') }}</th>
                                    <th>{{ __('messages.Title') }}</th>
                                    <th>{{ __('messages.Show') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr class="accordion-toggle collapsed" id="accordion1" data-bs-toggle="collapse"
                                        data-bs-parent="#accordion1" data-bs-target="#collapseOne">
                                        <td>{{ $video->id }}</td>
                                        <td>
                                            @if(($video->teacher) == !null)
                                                <h5 class="text-primary">{{ Str::limit( $video->teacher->name, 40) }}</h5>
                                            @elseif(is_null($video->teacher))
                                                {{ '-' }}
                                            @endif
                                        </td>
                                        <td>{{ Str::limit( $video->title, 30) }}</td>
                                        <td>
                                            <a class="" href="{{ route('home.view', $video->id) }}">
                                                <button type="submit"
                                                        class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</button>
                                            </a>
{{--                                            <a class="" href="{{ route('home.videos.download', $video->video) }}">--}}
{{--                                                <button type="submit"--}}
{{--                                                        class="btn btn-outline-success btn-sm">{{ __('messages.download') }}</button>--}}
{{--                                            </a>--}}
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
    </section>
@endsection
