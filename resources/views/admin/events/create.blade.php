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
                                <h3 class="mb-0">{{ __('messages.Create Events')}}</h3>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        <form action="{{ route('admin.event.store') }}" method="POST"
                              enctype="multipart/form-data" class="row gx-3" novalidate="">
                            @csrf
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="image">{{ __('messages.Image')}}</label>
                                <input type="file" name="image" id="image"
                                       class="form-control @error('image') is-invalid @enderror"
                                       value="{{ old('name') }}">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="title_tk">{{ __('messages.Title (tm)')}}</label>
                                <input type="text" name="title_tk" id="title_tk"
                                       class="form-control @error('title_tk') is-invalid @enderror"
                                       value="{{ old('title_tk') }}">
                                @error('title_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_tk">{{ __('messages.Description (tm)')}}</label>
                                <textarea name="description_tk" id="description_tk" class="form-control @error('description_tk') is-invalid @enderror" rows="4">
                                </textarea>
                                @error('description_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <hr class="my-5">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="title_ru">{{ __('messages.Title (ru)')}}</label>
                                <input type="text" name="title_ru" id="title_ru"
                                       class="form-control @error('title_ru') is-invalid @enderror"
                                       value="{{ old('title_ru') }}">
                                @error('title_ru')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_ru">{{ __('messages.Description (ru)')}}</label>
                                <textarea name="description_ru" id="description_ru" class="form-control @error('description_ru') is-invalid @enderror" rows="4">
                                </textarea>
                                @error('description_ru')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <hr class="my-5">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="title_en">{{ __('messages.Title (en)')}}</label>
                                <input type="text" name="title_en" id="title_en"
                                       class="form-control @error('title_en') is-invalid @enderror"
                                       value="{{ old('title_en') }}">
                                @error('title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_en">{{ __('messages.Description (en)')}}</label>
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="4">
                                </textarea>
                                @error('description_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">{{ __('messages.Add')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
