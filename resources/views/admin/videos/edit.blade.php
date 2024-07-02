@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-8 col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-4 mb-lg-0">

                            <div class="ms-3">
                                <h3 class="mb-0">{{ __('messages.Profile Details') }}</h3>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.video.show', $video->id) }}"
                               class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</a>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>

                        @can('update', $video)
                            <!-- Form -->
                            <div class="mb-3 col-6 col-md-6">
                                <video width="320" height="240" controls>
                                    <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                </video>
                            </div>
                            <form action="{{ route('admin.video.update', $video->id) }}" method="POST"
                                  enctype="multipart/form-data" class="row gx-3" novalidate="">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="video">{{ __('messages.Video') }}:</label>
                                    <small>{{ $video->video }}</small>
                                    <input type="file" name="video" id="video"
                                           class="form-control @error('video') is-invalid @enderror">
                                    @error('video')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- First name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="title_tk">{{ __('messages.Title (en)') }}</label>
                                    <input type="text" name="title_tk" id="title_tk"
                                           class="form-control @error('title_tk') is-invalid @enderror"
                                           value="{{ $video->title_tk }}">
                                    @error('title_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="title_ru">{{ __('messages.Title (ru)') }}</label>
                                    <input type="text" name="title_ru" id="title_ru"
                                           class="form-control @error('title_ru') is-invalid @enderror"
                                           value="{{ $video->title_ru }}">
                                    @error('title_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="title_en">{{ __('messages.Title (en)') }}</label>
                                    <input type="text" name="title_en" id="title_en"
                                           class="form-control @error('title_en') is-invalid @enderror"
                                           value="{{ $video->title_en }}">
                                    @error('title_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="category">{{ __('messages.Choose teacher') }}</label>
                                    <select name="teacher_id" class="form-select text-dark fs-4" id="category"
                                            required="required">
                                        <option value="" class="text-primary fs-4">{{ __('messages.Choose One...') }}</option>
                                        @foreach($teachers as $teacher)
                                            <option
                                                value="{{ $teacher->id }}" {{ $video->teacher_id == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('teacher_id'))
                                        <span class="help-block text-danger h6">
                                                     {{ $errors->first('teacher_id') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="submit">{{ __('messages.Update') }}</button>
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

@endsection

