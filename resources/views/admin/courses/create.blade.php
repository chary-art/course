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
                                <h3 class="mb-0">{{ __('messages.Add Course') }}</h3>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        <form action="{{ route('admin.course.store') }}" method="POST"
                              enctype="multipart/form-data" class="row gx-3" novalidate="">
                            @csrf
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="course_tk">{{ __('messages.Course (tm)') }}</label>
                                <input type="text" name="course_tk" id="course_tk"
                                       class="form-control @error('course_tk') is-invalid @enderror"
                                       value="{{ old('course_tk') }}" autofocus>
                                @error('course_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="course_ru">{{ __('messages.Course (ru)') }}</label>
                                <input type="text" name="course_ru" id="course_ru"
                                       class="form-control @error('course_ru') is-invalid @enderror"
                                       value="{{ old('course_ru') }}">
                                @error('course_ru')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="course_en">{{ __('messages.Course (en)') }}</label>
                                <input type="text" name="course_en" id="course_en"
                                       class="form-control @error('course_en') is-invalid @enderror"
                                       value="{{ old('course_en') }}">
                                @error('course_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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

@endsection
