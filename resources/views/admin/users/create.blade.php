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
                                <h3 class="mb-0">{{ __('messages.Create Profile') }}</h3>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data"
                              class="row gx-3" novalidate="">
                            @csrf
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="image">{{ __('messages.Image') }}</label>
                                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"
                                       class="form-control @error('image') is-invalid @enderror"
                                       value="{{ old('image') }}">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="name">{{ __('messages.Name') }}</label>
                                <input type="text" name="name" id="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="surname">{{ __('messages.Surname') }}</label>
                                <input type="text" name="surname" id="surname"
                                       class="form-control @error('surname') is-invalid @enderror"
                                       value="{{ old('surname') }}">
                                @error('surname')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="email">{{ __('messages.E-mail') }}</label>
                                <input type="email" name="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="password">{{ __('messages.Password') }}</label>
                                <input type="password" name="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="role">{{ __('messages.Choose role') }}</label>
                                <select name="role_id" class="form-select text-dark fs-4" id="role" required="">
                                    @foreach($roles as $id => $role)
                                        <option
                                            value="{{ $id }}" {{ $id == old('role_id') ? 'selected' : '' }}>{{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                {{--                                                    <div class="invalid-feedback">{{ __('messages.Please choose role.') }}</div>--}}
                            </div>

                            <div class="col-12">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">{{ __('messages.Add') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
