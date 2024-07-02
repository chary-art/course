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
                                <h3 class="mb-0">{{ __('messages.Video Upload') }} </h3>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        <div class="container mt-5">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    @if ($message = Session::get('success'))--}}
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif

{{--                                    @if (count($errors) > 0)--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <strong>Whoops!</strong> There were some problems with your input.--}}
{{--                                            <ul>--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                    <form action="{{ route('admin.video.store') }}" method="POST" class="row gx-3"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label"
                                                   for="video">{{ __('messages.Video') }}</label>
                                            <input type="file" name="video" id="video"
                                                   class="form-control @error('video') is-invalid @enderror"
                                                   value="{{ old('video') }}">
                                            @error('video')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="title_tk">{{ __('messages.Title (tm)') }}</label>
                                            <input type="text" name="title_tk" id="title_tk"
                                                   class="form-control @error('title_tk') is-invalid @enderror"
                                                   value="{{ old('title_tk') }}" autofocus>
                                            @error('title_tk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="title_ru">{{ __('messages.Title (ru)') }}</label>
                                            <input type="text" name="title_ru" id="title_ru"
                                                   class="form-control @error('title_ru') is-invalid @enderror"
                                                   value="{{ old('title_ru') }}" autofocus>
                                            @error('title_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="title_en">{{ __('messages.Title (en)') }}</label>
                                            <input type="text" name="title_en" id="title_en"
                                                   class="form-control @error('title_en') is-invalid @enderror"
                                                   value="{{ old('title_en') }}" autofocus>
                                            @error('title_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label"
                                                   for="category">{{ __('messages.Choose teacher') }}</label>
                                            <select name="teacher_id" class="form-select text-dark fs-4" id="category"
                                                    required="required">
                                                <option value=""
                                                        class="text-primary fs-4">{{ __('messages.Choose One...') }}</option>
                                                @foreach($teachers as $teacher)
                                                    <option class="fs-4"
                                                            value="{{ $teacher->id }}" {{ $teacher->id ? 'selected' : '' }}>
                                                        {{ $teacher->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('teacher_id'))
                                                <span class="help-block text-danger h6">
                                                     {{ $errors->first('teacher_id') }}
                                                 </span>
                                            @endif
                                            <div class="rounded bg-light-primary mt-2">
                                                <p class="text-dark text-center">{{ __('messages.Attension: You have to create a teacher on teachers menu before select.') }}</p>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">{{ __('messages.Add') }}</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
