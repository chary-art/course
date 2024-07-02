@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-9 col-md-8 col-12">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="border-bottom pb-3 mb-3 d-md-flex">
                    @if(Session::has('update'))
                        <div id="alert" class="alert alert-success">
                            {{ Session::get('update') }}
                        </div>
                    @endif
                </div>
                <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $user->image) }}" alt="" class="img-4by3-lg rounded">
                        </div>
                        <div class="ms-3">
                            <h3 class="mb-0">{{ __('messages.Detail') }}: </h3>
                        </div>
                        <div class="ms-3">
                            <h2 class="mb-0 h2 fw-bold">{{$user->name . ' ' . $user->surname}}</h2>
                        </div>
                    </div>
                    <div>
                        @can('update', $user)
                            <a class="btn-icon btn btn-ghost" role="button" data-bs-offset="-20,20"
                               href="{{ route('admin.user.edit', $user->id) }}">
                                <i class="bi bi-pencil-square h2" style="color: orange"></i>
                            </a>
                        @endcan
                    </div>
                </div>
                <hr class="my-5">
                <div>
                    <!-- Form -->
                    <form class="row gx-3" novalidate="">
                        <!-- First name -->
                        <div class="mb-3 col-12 col-md-6">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ __('messages.ID') }}</th>
                                    <td>{{$user->id}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('messages.Name') }}</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Surname') }}</th>
                                    <td>{{$user->surname}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('messages.E-mail') }}</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('messages.Role') }}</th>
                                    <td>
                                        @foreach($roles as $id => $role)
                                            @if($user->role_id == $id)
                                                {{ $role }}
                                            @endif
                                        @endforeach
                                        {{  $user->role_id ?? 'null' }}.
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



