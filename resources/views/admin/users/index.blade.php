@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="border-bottom pb-3 mb-3 d-md-flex">
            @if(Session::has('successful_message'))
                <div id="alert" class="alert alert-success">
                    {{ Session::get('successful_message') }}
                </div>
            @endif
        </div>
        <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
                <h1 class="mb-1 h2 fw-bold">{{ __('messages.Users') }}</h1>
            </div>
            {{--            @if(Auth::user()->role == 0)--}}
            <div>
                @can('create', App\Models\User::class)
                    <a href="{{ route('admin.user.create') }}"
                       class="btn btn-primary">{{ __('messages.Add New User') }}</a>
                @endcan
            </div>
            {{--            @endif--}}
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Table -->
                    <div class="table-responsive border-0 overflow-y-hidden">
                        <table
                            class="table mb-0 text-nowrap dataTable table-centered table-hover dtr-inline text-center">
                            <thead class="table-light">
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Image') }}</th>
                                <th>{{ __('messages.Name & Surname') }}</th>
                                <th>{{ __('messages.E-mail') }}</th>
                                <th>{{ __('messages.Role') }}</th>
                                <th></th>
                                <th>{{ __('messages.Delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr class="accordion-toggle collapsed" id="accordion1" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion1" data-bs-target="#collapseOne">
                                    <td style="width: 5%">{{ $user->id }}</td>
                                    <td class="" style=" width: 5%">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $user->image) }}" alt=""
                                                 class="img-4by3-md rounded">
                                            {{--                                            <img src="imageUrl ? imageUrl : '{{ Auth::user()->picture ? asset(Auth::user()->picture) : URL('images/user-default-avatar.png') }}'"--}}
                                            {{--                                                 alt="Photo de profil" class="w-24 h-24 rounded-md object-cover border-4 border-dark-300">--}}
                                        </div>
                                    </td>
                                    <td>{{ Str::limit( $user->name, 40) }} {{ Str::limit( $user->surname, 40) }}</td>
                                    <td>{{  $user->email }}</td>
                                    <td>
                                        @foreach($roles as $id => $role)
                                            @if($user->role_id == $id)
                                                {{ $role }}
                                            @endif
                                        @endforeach
                                        {{  $user->role_id ?? 'null' }}.
                                    </td>
                                    <td style="width: 12%">
                                        @can('view', $user)
                                            <a class="" href="{{ route('admin.user.show', $user->id) }}">
                                                <button type="submit"
                                                        class="btn btn-outline-primary btn-sm">{{ __('messages.Show') }}</button>
                                            </a>
                                        @endcan
                                        @can('update', $user)
                                            <a class="btn-icon btn btn-ghost" role="button"
                                               href="{{ route('admin.user.edit', $user->id) }}">
                                                <i class="bi bi-pencil-square h1 mt-2" style="color: orange"></i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td style="width: 5%">
                                        @can('delete', $user)
                                            <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                               href="" role="button"
                                               id="courseDropdown1" data-bs-toggle="dropdown"
                                               data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                            <span class="dropdown-header text-center">{{ __('messages.Delete') }}</span>
{{--                                                @if(Auth::user()->role == 0)--}}
                                                    <a class="dropdown-item" href="#">
                                                     <i class="fe fe-trash dropdown-item-icon"></i>
                                                     <form action="{{ route('admin.user.delete', $user->id) }}"
                                                           method="POST">
                                                            @csrf
                                                         @method('delete')
                                                            <button type="submit"
                                                                    class="btn btn-danger mb-2 btn-sm mt-2">{{ __('messages.Delete') }}</button>
                                                     </form>
                                                </a>
{{--                                                @endif--}}
                                            </span>
                                        </span>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
