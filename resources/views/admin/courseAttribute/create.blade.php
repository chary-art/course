@extends('admin.layouts.app')

@section('content')
    @can('create', App\Models\CourseAttribute::class)
        <div class="row">
            <div class="col-lg-9 col-md-8 col-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center mb-4 mb-lg-0">
                                <div class="ms-3">
                                    <h3 class="mb-0">{{ __('messages.Create Stage') }}</h3>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                        <hr class="my-5">
                        <div>
                            <form action="{{ route('admin.courseAttribute.store') }}" method="POST"
                                  enctype="multipart/form-data" class="row gx-3" novalidate="">
                                @csrf
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="stage_tk">{{ __('messages.Stage (tm)') }}</label>
                                    <input type="text" name="stage_tk" id="stage_tk"
                                           class="form-control @error('stage_tk') is-invalid @enderror"
                                           value="{{ old('stage_tk') }}" required>
                                    @error('stage_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="description_tk">{{ __('messages.Description (tm)') }}</label>
                                    <textarea name="description_tk" id="description_tk"
                                              class="form-control @error('description_tk') is-invalid @enderror"
                                              rows="4">
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
                                           value="{{ old('stage_ru') }}" required>
                                    @error('stage_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="description_ru">{{ __('messages.Description (ru)') }}</label>
                                    <textarea name="description_ru" id="description_ru"
                                              class="form-control @error('description_ru') is-invalid @enderror"
                                              rows="4">
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
                                           value="{{ old('stage_en') }}">
                                    @error('stage_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="description_en">{{ __('messages.Description (en)') }}</label>
                                    <textarea name="description_en" id="description_en"
                                              class="form-control @error('description_en') is-invalid @enderror"
                                              rows="4">
                                </textarea>
                                    @error('description_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="category">{{ __('messages.Choose course') }}</label>
                                    <select name="course_id" class="form-select" id="category" required="required">
                                        <option value="">Choose One...</option>
                                        @foreach($courses as $course)
                                            <option
                                                value="{{ $course->id }}" {{ $course->id ? 'selected' : '' }}>
                                                {{ $course->course }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('course_id'))
                                        <span class="help-block text-danger h6">
                                        {{ $errors->first('course_id') }}
                                    </span>
                                    @endif
                                    <div class="rounded bg-light-primary mt-2">
                                        <p class="text-dark text-center">{{ __('messages.Attension: You have to create a course on courses menu before select.') }}</p>
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
    @endcan
@endsection


