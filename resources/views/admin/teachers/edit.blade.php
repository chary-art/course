@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-8 col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $teacher->image) }}" alt="" class="img-4by3-lg rounded">
                            </div>
                            <div class="ms-3">
                                <h3 class="mb-0">{{ __('messages.Edit Teacher Detail') }}</h3>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.teacher.show', $teacher->id) }}"
                               class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</a>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        @can('update', $teacher)
                            <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST"
                                  enctype="multipart/form-data" class="row gx-3" novalidate="">
                                @csrf
                                @method('PATCH')
                                <!-- First name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="name">{{ __('messages.Name') }}</label>
                                    <input type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ $teacher->name }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="image">{{ __('messages.Image') }}:</label>
                                    <small>{{ $teacher->image }}</small>
                                    <input type="file" name="image" id="image"
                                           class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="surname">{{ __('messages.Surname') }}</label>
                                    <input type="text" name="surname" id="surname"
                                           class="form-control @error('surname') is-invalid @enderror"
                                           value="{{ $teacher->surname }}">
                                    @error('surname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="phone">{{ __('messages.Phone') }}</label>
                                    <input type="text" name="phone" id="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ $teacher->phone }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="experience_tk">{{ __('messages.Experience year (tm)') }}</label>
                                    <input type="text" name="experience_tk" id="experience_tk"
                                           class="form-control @error('experience_tk') is-invalid @enderror"
                                           value="{{ $teacher->experience_tk }}">
                                    @error('experience_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="hobby_tk">{{ __('messages.Hobby (tm)') }}</label>
                                    <input type="text" name="hobby_tk" id="hobby_tk"
                                           class="form-control @error('hobby_tk') is-invalid @enderror"
                                           value="{{ $teacher->hobby_tk }}">
                                    @error('hobby_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="major_tk">{{ __('messages.University Major (tm)') }}</label>
                                    <input type="text" name="major_tk" id="major_tk"
                                           class="form-control @error('major_tk') is-invalid @enderror"
                                           value="{{ $teacher->major_tk }}">
                                    @error('major_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="degree_tk">{{ __('messages.Graduate degree (tm)') }}</label>
                                    <input type="text" name="degree_tk" id="degree_tk"
                                           class="form-control @error('degree_tk') is-invalid @enderror"
                                           value="{{ $teacher->degree_tk }}">
                                    @error('degree_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="category">{{ __('messages.Choose course') }}</label>
                                    <select name="course_id" class="form-select" id="category">
                                        @if ($courses->count())
                                            @foreach($courses as $course)
                                                <option
                                                    value="{{ $course->id }}" {{ $teacher->course_id == $course->id ? 'selected' : '' }}>
                                                    {{ $course->course }}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('course_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">{{ __('messages.Please choose course') }}</div>
                                </div>
                                <hr class="my-5">
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="experience_ru">{{ __('messages.Experience year (ru)') }}</label>
                                    <input type="text" name="experience_ru" id="experience_ru"
                                           class="form-control @error('experience_ru') is-invalid @enderror"
                                           value="{{ $teacher->experience_ru }}">
                                    @error('experience_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="hobby_ru">{{ __('messages.Hobby (ru)') }}</label>
                                    <input type="text" name="hobby_ru" id="hobby_ru"
                                           class="form-control @error('hobby_ru') is-invalid @enderror"
                                           value="{{ $teacher->hobby_ru }}">
                                    @error('hobby_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Address -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="major_ru">{{ __('messages.University Major (ru)') }}</label>
                                    <input type="text" name="major_ru" id="major_ru"
                                           class="form-control @error('major_ru') is-invalid @enderror"
                                           value="{{ $teacher->major_ru }}">
                                    @error('major_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="degree_ru">{{ __('messages.Graduate degree (ru)') }}</label>
                                    <input type="text" name="degree_ru" id="degree_ru"
                                           class="form-control @error('degree_ru') is-invalid @enderror"
                                           value="{{ $teacher->degree_ru }}">
                                    @error('degree_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="address_ru">{{ __('messages.Address (ru)') }}</label>
                                    <input type="text" name="address_ru" id="address_ru"
                                           class="form-control @error('address_ru') is-invalid @enderror"
                                           value="{{ $teacher->address_ru }}">
                                    @error('address_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr class="my-5">
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="experience_en">{{ __('messages.Experience year (en)') }}</label>
                                    <input type="text" name="experience_en" id="experience_en"
                                           class="form-control @error('experience_en') is-invalid @enderror"
                                           value="{{ $teacher->experience_en }}">
                                    @error('experience_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="hobby_en">{{ __('messages.Hobby (en)') }}</label>
                                    <input type="text" name="hobby_en" id="hobby_en"
                                           class="form-control @error('hobby_en') is-invalid @enderror"
                                           value="{{ $teacher->hobby_en }}">
                                    @error('hobby_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Address -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="major_en">{{ __('messages.University Major (en)') }}</label>
                                    <input type="text" name="major_en" id="major_en"
                                           class="form-control @error('major_en') is-invalid @enderror"
                                           value="{{ $teacher->major_en }}">
                                    @error('major_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="degree_en">{{ __('messages.Graduate degree (en)') }}</label>
                                    <input type="text" name="degree_en" id="degree_en"
                                           class="form-control @error('degree_en') is-invalid @enderror"
                                           value="{{ $teacher->degree_en }}">
                                    @error('degree_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="address_en">{{ __('messages.Address (en)') }}</label>
                                    <input type="text" name="address_en" id="address_en"
                                           class="form-control @error('address_en') is-invalid @enderror"
                                           value="{{ $teacher->address_en }}">
                                    @error('address_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <!-- Button -->
                                    <button class="btn btn-primary"
                                            type="submit">{{ __('messages.Update Profile') }}</button>
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

@endsection

