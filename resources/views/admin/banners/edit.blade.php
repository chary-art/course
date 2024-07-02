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
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="" class="img-4by3-lg rounded">
                            </div>
                            <div class="ms-3">
                                <h3 class="mb-0">{{ __('messages.Profile Details') }}</h3>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.banner.show', $banner->id) }}"
                               class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</a>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        @can('update', $banner)
                            <!-- Form -->
                            <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST"
                                  enctype="multipart/form-data" class="row gx-3" novalidate="">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="image">{{ __('messages.Image') }}:</label>
                                    <small>{{ $banner->image }}</small>
                                    <input type="file" name="image" id="image"
                                           class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- First name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="title_tk">{{ __('messages.Title (tm)') }}</label>
                                    <input type="text" name="title_tk" id="title_tk"
                                           class="form-control @error('title_tk') is-invalid @enderror"
                                           value="{{ $banner->title_tk }}">
                                    @error('title_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="news_tk">{{ __('messages.News (tm)') }}</label>
                                    <input type="text" name="news_tk" id="news_tk"
                                           class="form-control @error('news_tk') is-invalid @enderror"
                                           value="{{ $banner->news_tk }}">
                                    @error('news_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="description_tk">{{ __('messages.Description (tm)') }}</label>
                                    <textarea name="description_tk" id="description_tk"
                                              class="form-control @error('description_tk') is-invalid @enderror"
                                              rows="4">{{$banner->description_tk}}
                                     </textarea>
                                    @error('description_tk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr class="my-5">
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="title_ru">{{ __('messages.Title (ru)') }}</label>
                                    <input type="text" name="title_ru" id="title_ru"
                                           class="form-control @error('title_ru') is-invalid @enderror"
                                           value="{{ $banner->title_ru }}">
                                    @error('title_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="news_ru">{{ __('messages.News (ru)') }}</label>
                                    <input type="text" name="news_ru" id="news_ru"
                                           class="form-control @error('news_ru') is-invalid @enderror"
                                           value="{{ $banner->news_ru }}">
                                    @error('news_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="description_ru">{{ __('messages.Description (ru)') }}</label>
                                    <textarea name="description_ru" id="description_ru"
                                              class="form-control @error('description_ru') is-invalid @enderror"
                                              rows="4">{{$banner->description_ru}}
                                     </textarea>
                                    @error('description_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr class="my-5">

                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="title_en">{{ __('messages.Title (en)') }}</label>
                                    <input type="text" name="title_en" id="title_en"
                                           class="form-control @error('title_en') is-invalid @enderror"
                                           value="{{ $banner->title_en }}">
                                    @error('title_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="news_en">{{ __('messages.News (en)') }}</label>
                                    <input type="text" name="news_en" id="news_en"
                                           class="form-control @error('news_en') is-invalid @enderror"
                                           value="{{ $banner->news_en }}">
                                    @error('news_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label"
                                           for="description_en">{{ __('messages.Description (en)') }}</label>
                                    <textarea name="description_en" id="description_en"
                                              class="form-control @error('description_en') is-invalid @enderror"
                                              rows="4">{{$banner->description_en}}
                                </textarea>
                                    @error('description_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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

