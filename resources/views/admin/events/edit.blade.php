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
                                <img src="{{ asset('storage/' . $event->image) }}" alt="" class="img-4by3-lg rounded">
                            </div>
                            <div class="ms-3">
                                <h3 class="mb-0">{{ __('messages.Edit Event Details') }}</h3>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.event.show', $event->id) }}"
                               class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</a>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        <!-- Form -->
                        <form action="{{ route('admin.event.update', $event->id) }}" method="POST"
                              enctype="multipart/form-data" class="row gx-3" novalidate="">
                            @csrf
                            @method('PATCH')
                            <!-- First name -->

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="title_tk">{{ __('messages.Title (tm)') }}</label>
                                <input type="text" name="title_tk" id="title_tk" value="{{$event->title_tk}}"
                                       class="form-control @error('title_tk') is-invalid @enderror">
                                @error('title_tk')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="image">{{ __('messages.Image') }}: </label>
                                <small>{{ $event->image }}</small>
                                <input type="file" name="image" id="image"
                                       class="form-control @error('image') is-invalid @enderror"
                                       value="{{ old('image') }}">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_tk">{{ __('messages.Description (tm)') }}</label>
                                <textarea name="description_tk" id="description_tk" class="form-control @error('description_tk') is-invalid @enderror" rows="4">{{$event->description_tk}}
                                </textarea>
                                @error('description_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <hr class="my-5">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="title_ru">{{ __('messages.Title (ru)') }}</label>
                                <input type="text" name="title_ru" id="title_ru" value="{{$event->title_ru}}"
                                       class="form-control @error('title_ru') is-invalid @enderror">
                                @error('title_ru')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_ru">{{ __('messages.Description (ru)') }}</label>
                                <textarea name="description_ru" id="description_ru" class="form-control @error('description_ru') is-invalid @enderror" rows="4">{{$event->description_ru}}
                                </textarea>
                                @error('description_ru')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <hr class="my-5">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="title_en">{{ __('messages.Title (en)') }}</label>
                                <input type="text" name="title_en" id="title_en" value="{{$event->title_en}}"
                                       class="form-control @error('title_en') is-invalid @enderror">
                                @error('title_en')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_en">{{ __('messages.Description (en)') }}</label>
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="4">{{$event->description_en}}
                                </textarea>
                                @error('description_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">{{ __('messages.Update Profile') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

