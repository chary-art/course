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
                                <h3 class="mb-0">Edit Details</h3>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.courseAttribute.show', $courseAttribute->id) }}"
                               class="btn btn-outline-primary btn-sm">Show</a>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        <form action="{{ route('admin.courseAttribute.update', $courseAttribute->id) }}" method="POST"
                              enctype="multipart/form-data" class="row gx-3" novalidate="">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="stage_tk">{{ __('messages.Stage (tm)') }}</label>
                                <input type="text" name="stage_tk" id="stage_tk"
                                       class="form-control @error('stage_tk') is-invalid @enderror"
                                       value="{{ $courseAttribute->stage_tk }}">
                                @error('stage_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_tk">{{ __('messages.Description (tm)') }}</label>
                                <textarea name="description_tk" id="description_tk"
                                          class="form-control @error('description_tk') is-invalid @enderror" rows="4">
                                    {{ $courseAttribute->description_tk }}
                                </textarea>
                                @error('description_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-5">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="stage_ru">{{ __('messages.Stage (ru)') }}</label>
                                <input type="text" name="stage_ru" id="stage_ru"
                                       class="form-control @error('stage_ru') is-invalid @enderror"
                                       value="{{ $courseAttribute->stage_ru }}">
                                @error('stage_ru')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_ru">{{ __('messages.Description (ru)') }}</label>
                                <textarea name="description_ru" id="description_ru"
                                          class="form-control @error('description_ru') is-invalid @enderror" rows="4">
                                    {{ $courseAttribute->description_ru }}
                                </textarea>
                                @error('description_ru')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-5">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="stage_en">{{ __('messages.Stage (en)') }}</label>
                                <input type="text" name="stage_en" id="stage_en"
                                       class="form-control @error('stage_en') is-invalid @enderror"
                                       value="{{ $courseAttribute->stage_en }}">
                                @error('stage_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_en">{{ __('messages.Description (en)') }}</label>
                                <textarea name="description_en" id="description_en"
                                          class="form-control @error('description_en') is-invalid @enderror" rows="4">
                                    {{ $courseAttribute->description_en }}
                                </textarea>
                                @error('description_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="category">{{ __('messages.Choose course') }}</label>
                                <select name="course_id" class="form-select" id="category" required="">
                                        @foreach($courses as $course)
                                            <option
                                                value="{{ $course->id }}" {{ $courseAttribute->course_id == $course->id ? 'selected' : '' }}>
                                                {{ $course->course }}
                                            </option>
                                        @endforeach
                                </select>
                                @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback">Please choose course.</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

