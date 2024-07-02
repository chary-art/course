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
                <h1 class="mb-1 h2 fw-bold">{{ __('messages.Videos') }}</h1>
            </div>
            <div>
                @can('create', App\Models\Video::class)
                    <a href="{{ route('admin.video.create') }}"
                       class="btn btn-primary">{{ __('messages.Add new video') }}
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
                                <th>{{ __('messages.Title') }}</th>
                                <th>{{ __('messages.Teachers') }}</th>
                                <th></th>
                                <th>{{ __('messages.Delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr class="accordion-toggle collapsed" id="accordion1" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion1" data-bs-target="#collapseOne">
                                    <td style="padding: 0; width: 5%">{{ $video->id }}</td>
                                    <td>{{ Str::limit( $video->title, 30) }}</td>
                                    <td>
                                        @if(($video->teacher) == !null)
                                            <a href="{{ route('admin.teacher.show', $video->teacher->id) }}">
                                                <h5 class="text-primary">{{ Str::limit( $video->teacher->name, 40) }}</h5>
                                            </a>
                                        @elseif(is_null($video->teacher))
                                            {{ '-' }}
                                        @endif
{{--                                        {{ Str::limit( $video->teacher_id, 26) }}--}}
                                    </td>

                                    <td style="padding: 0;width: 5%">
                                        @can('view', $video)
                                        <a class="" href="{{ route('admin.video.show', $video->id) }}">
                                            <button type="submit"
                                                    class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</button>
                                        </a>
                                        @endcan
                                        @can('update', $video)
                                            <a class="btn-icon btn btn-ghost" role="button"
                                               href="{{ route('admin.video.edit', $video->id) }}">
                                                <i class="bi bi-pencil-square h1 mt-2" style="color: orange"></i>
                                            </a>
                                        @endcan
                                    </td>

                                    <td>
                                        @can('delete', $video)
                                            <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                               href="" role="button"
                                               id="courseDropdown1" data-bs-toggle="dropdown"
                                               data-bs-offset="-20,20" aria-expanded="false">
                                                 <i class="bi bi-trash3-fill"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                            <span class="dropdown-header">{{ __('messages.Delete') }}</span>
                                                <a class="dropdown-item" href="">
                                                     <i class="fe fe-trash dropdown-item-icon"></i>
                                                     <form action="{{ route('admin.video.delete', $video->id) }}"
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
